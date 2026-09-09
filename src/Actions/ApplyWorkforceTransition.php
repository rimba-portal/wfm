<?php

declare(strict_types=1);

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Enums\WorkforceEventType;
use Rimba\Wfm\Models\WorkforceAssignment;
use Rimba\Wfm\Services\WorkforceAssignmentService;

final readonly class ApplyWorkforceTransition
{
    public function __construct(private WorkforceAssignmentService $workforceAssignmentService) {}

    public function execute(int $staffId, WorkforceEventType $type, array $changes, array $context = []): WorkforceAssignment
    {
        return $this->workforceAssignmentService->transition($staffId, $type, $changes, $context);
    }
}
