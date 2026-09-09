<?php

declare(strict_types=1);

namespace Rimba\Wfm\Events;

use Rimba\Wfm\Enums\WorkforceEventType;

final readonly class WorkforceAssignmentChanged
{
    public function __construct(public int $assignmentId, public int $staffId, public WorkforceEventType $type, public array $before, public array $after, public array $context = []) {}
}
