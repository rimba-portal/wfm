<?php

declare(strict_types=1);

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\WorkforceAssignment;
use Rimba\Wfm\Services\WorkforceAssignmentService;

final readonly class SeparateWorkforce
{
    public function __construct(private WorkforceAssignmentService $workforceAssignmentService) {}

    public function execute(int $staffId, array $context = []): WorkforceAssignment
    {
        return $this->workforceAssignmentService->separate($staffId, $context);
    }
}
