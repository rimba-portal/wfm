<?php

declare(strict_types=1);

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Enums\WorkforceEventType;
use Rimba\Wfm\Models\WorkforceAssignment;
use Rimba\Wfm\Services\WorkforceAssignmentService;

final readonly class TransferWorkforce
{
    public function __construct(private WorkforceAssignmentService $workforceAssignmentService) {}

    public function execute(int $staffId, array $changes, array $context = []): WorkforceAssignment
    {
        return $this->workforceAssignmentService->transition($staffId, WorkforceEventType::Transferred, $changes, $context);
    }
}
