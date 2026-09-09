<?php

declare(strict_types=1);

namespace Rimba\Wfm\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Rimba\Wfm\Enums\WorkforceAssignmentStatus;
use Rimba\Wfm\Enums\WorkforceEventType;
use Rimba\Wfm\Events\WorkforceAssignmentChanged;
use Rimba\Wfm\Models\WorkforceAssignment;

final class WorkforceAssignmentService
{
    private const STATE_FIELDS = ['org_corp_id', 'org_unit_id', 'org_team_id', 'job_position_id', 'manager_staff_id', 'agreement_id', 'shift_id', 'assignment_type', 'status', 'effective_from', 'effective_to', 'is_primary'];

    public function transition(int $staffId, WorkforceEventType $type, array $changes, array $context = []): WorkforceAssignment
    {
        return DB::transaction(function () use ($staffId, $type, $changes, $context): WorkforceAssignment {
            $current = WorkforceAssignment::query()
                ->where('staff_id', $staffId)->where('is_primary', true)
                ->where('status', WorkforceAssignmentStatus::Active->value)
                ->lockForUpdate()->latest('effective_from')->latest('id')->first();

            $before = $current ? $this->state($current) : [];
            $effectiveAt = $context['effective_at'] ?? now();

            if ($current && $this->requiresNewAssignment($type)) {
                $current->update([
                    'status' => WorkforceAssignmentStatus::Ended,
                    'effective_to' => $effectiveAt->toDateString(),
                    'is_primary' => false,
                ]);

                $assignment = WorkforceAssignment::create(array_merge(
                    Arr::only($before, self::STATE_FIELDS),
                    Arr::only($changes, self::STATE_FIELDS),
                    [
                        'uuid' => (string) Str::uuid(),
                        'staff_id' => $staffId,
                        'status' => WorkforceAssignmentStatus::Active,
                        'effective_from' => $effectiveAt->toDateString(),
                        'effective_to' => null,
                        'is_primary' => true,
                        'source' => $context['source'] ?? 'wfm',
                        'source_reference' => $context['source_reference'] ?? null,
                        'attributes' => $changes['attributes'] ?? $current->attributes,
                    ]
                ));
            } elseif ($current) {
                $current->update(Arr::only($changes, array_merge(self::STATE_FIELDS, ['attributes', 'source', 'source_reference'])));
                $assignment = $current->refresh();
            } else {
                if (! in_array($type, [WorkforceEventType::Hired, WorkforceEventType::Rehired, WorkforceEventType::Assigned], true)) {
                    throw new InvalidArgumentException("Staff {$staffId} has no active assignment.");
                }

                $assignment = WorkforceAssignment::create(array_merge(
                    Arr::only($changes, array_merge(self::STATE_FIELDS, ['attributes'])),
                    ['uuid' => (string) Str::uuid(), 'staff_id' => $staffId, 'status' => WorkforceAssignmentStatus::Active,
                        'effective_from' => $effectiveAt->toDateString(), 'is_primary' => true,
                        'source' => $context['source'] ?? 'wfm', 'source_reference' => $context['source_reference'] ?? null]
                ));
            }

            $after = $this->state($assignment);
            event(new WorkforceAssignmentChanged($assignment->id, $staffId, $type, $before, $after, $context));

            return $assignment;
        });
    }

    public function separate(int $staffId, array $context = []): WorkforceAssignment
    {
        return DB::transaction(function () use ($staffId, $context): WorkforceAssignment {
            $assignment = WorkforceAssignment::query()->where('staff_id', $staffId)->where('is_primary', true)
                ->where('status', WorkforceAssignmentStatus::Active->value)->lockForUpdate()->firstOrFail();
            $before = $this->state($assignment);
            $effectiveAt = $context['effective_at'] ?? now();
            $assignment->update(['status' => WorkforceAssignmentStatus::Ended, 'effective_to' => $effectiveAt->toDateString(), 'is_primary' => false]);
            $after = $this->state($assignment->refresh());
            event(new WorkforceAssignmentChanged($assignment->id, $staffId, WorkforceEventType::Separated, $before, $after, $context));

            return $assignment;
        });
    }

    private function requiresNewAssignment(WorkforceEventType $type): bool
    {
        return in_array($type, [WorkforceEventType::Transferred, WorkforceEventType::Promoted, WorkforceEventType::Demoted, WorkforceEventType::Reassigned, WorkforceEventType::OrganizationChanged, WorkforceEventType::Rehired], true);
    }

    private function state(WorkforceAssignment $assignment): array
    {
        return Arr::only($assignment->getAttributes(), self::STATE_FIELDS);
    }
}
