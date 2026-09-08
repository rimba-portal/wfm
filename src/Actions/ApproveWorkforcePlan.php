<?php

declare(strict_types=1);

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\WorkforcePlan;

class ApproveWorkforcePlan
{
    public function execute(WorkforcePlan $plan): WorkforcePlan
    {
        $plan->update(['status' => 'approved']);

        return $plan;
    }
}
