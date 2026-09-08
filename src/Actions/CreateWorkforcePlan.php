<?php

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\WorkforcePlan;
use Rimba\Wfm\Models\ManpowerRequest;
class CreateWorkforcePlan
{
    public function execute(array $data): WorkforcePlan
    {
        return WorkforcePlan::create($data);
    }
}

