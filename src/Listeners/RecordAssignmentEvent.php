<?php

declare(strict_types=1);

namespace Rimba\Wfm\Listeners;

use Illuminate\Support\Str;
use Rimba\Wfm\Events\WorkforceAssignmentChanged;
use Rimba\Wfm\Events\WorkforceEventRecorded;
use Rimba\Wfm\Models\WorkforceEvent;

final class RecordAssignmentEvent
{
    public function handle(WorkforceAssignmentChanged $event): void
    {
        $context = $event->context;
        $record = WorkforceEvent::firstOrCreate(
            [
                'source' => $context['source'] ?? 'wfm',
                'source_reference' => $context['source_reference'] ?? null,
                'event_type' => $event->type->value,
            ],
            [
                'uuid' => (string) Str::uuid(),
                'staff_id' => $event->staffId,
                'workforce_assignment_id' => $event->assignmentId,
                'effective_at' => $context['effective_at'] ?? now(),
                'triggerable_type' => $context['triggerable_type'] ?? null,
                'triggerable_id' => $context['triggerable_id'] ?? null,
                'before_state' => $event->before,
                'after_state' => $event->after,
                'remarks' => $context['remarks'] ?? null,
                'recorded_by_id' => $context['recorded_by_id'] ?? null,
                'attributes' => $context['attributes'] ?? null,
            ]
        );
        if ($record->wasRecentlyCreated) {
            event(new WorkforceEventRecorded($record->id));
        }
    }
}
