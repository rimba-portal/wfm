<?php

namespace Rimba\Wfm\Events;
class WorkforcePlanApproved
{
    public function __construct(public int $workforcePlanId) {}
}

