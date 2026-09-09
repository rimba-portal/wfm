<?php

declare(strict_types=1);

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Enums\WorkforceEventType;
use Rimba\Wfm\Models\WorkforceAssignment;
use Rimba\Wfm\Services\WorkforceAssignmentService;

final readonly class ChangeWorkforceShift
{
    public function __construct(private WorkforceAssignmentService $workforceAssignmentService) {}

    public function execute(int $staffId, ?int $shiftId, array $context = []): WorkforceAssignment
    {
        return $this->workforceAssignmentService->transition($staffId, WorkforceEventType::ShiftChanged, ['shift_id' => $shiftId], $context);
    }
}
