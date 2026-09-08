<?php

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\WorkforcePlan;
use Rimba\Wfm\Models\ManpowerRequest;
class ApproveManpowerRequest
{
    public function execute(ManpowerRequest $request): ManpowerRequest
    {
        $request->update(['status' => 'approved']);
        return $request;
    }
}

