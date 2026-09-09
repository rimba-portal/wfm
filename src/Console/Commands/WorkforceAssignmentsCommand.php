<?php

declare(strict_types=1);

namespace Rimba\Wfm\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Rimba\Wfm\Enums\WorkforceAssignmentStatus;
use Rimba\Wfm\Models\WorkforceAssignment;

#[Description('List current or historical workforce assignments.')]
#[Signature('wfm:assignments {--staff=} {--all}')]
final class WorkforceAssignmentsCommand extends Command
{
    public function handle(): int
    {
        $builder = WorkforceAssignment::query()->with(['staff', 'orgUnit', 'jobPosition', 'manager', 'shift']);
        if (! $this->option('all')) {
            $builder->where('status', WorkforceAssignmentStatus::Active->value)->where('is_primary', true);
        }

        if ($staff = $this->option('staff')) {
            $builder->whereHas('staff', fn (Builder $q) => $q->where('staff_no', $staff)->orWhere('uuid', $staff));
        }

        $rows = $builder->orderBy('staff_id')->get()->map(fn (WorkforceAssignment $a): array => [
            $a->staff?->staff_no, $a->staff?->name, $a->jobPosition?->title, $a->orgUnit?->name, $a->manager?->name, $a->shift?->name, $a->status->value, $a->effective_from?->toDateString(), $a->effective_to?->toDateString(),
        ])->all();
        $this->table(['Staff No', 'Staff', 'Position', 'Org Unit', 'Manager', 'Shift', 'Status', 'From', 'To'], $rows);

        return self::SUCCESS;
    }
}
