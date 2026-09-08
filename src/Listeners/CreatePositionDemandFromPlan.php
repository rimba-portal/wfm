<?php

namespace Rimba\Wfm\Listeners;

use Rimba\Wfm\Events\WorkforcePlanApproved;
class CreatePositionDemandFromPlan
{
    public function handle(WorkforcePlanApproved $event): void
    {
        // integrate with jawat / manpower planning
    }
}

