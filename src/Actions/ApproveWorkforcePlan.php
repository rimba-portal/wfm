<?php

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\WorkforcePlan;
use Rimba\Wfm\Models\ManpowerRequest;
class ApproveWorkforcePlan
{
    public function execute(WorkforcePlan $plan): WorkforcePlan
    {
        $plan->update(['status' => 'approved']);
        return $plan;
    }
}

