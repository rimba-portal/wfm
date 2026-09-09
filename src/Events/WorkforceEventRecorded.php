<?php

declare(strict_types=1);

namespace Rimba\Wfm\Events;

final readonly class WorkforceEventRecorded
{
    public function __construct(public int $workforceEventId) {}
}
