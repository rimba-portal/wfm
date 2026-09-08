<?php

declare(strict_types=1);

namespace Rimba\Wfm\Events;

class WorkforcePlanApproved
{
    public function __construct(public int $workforcePlanId) {}
}
