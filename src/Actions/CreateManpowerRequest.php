<?php

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\WorkforcePlan;
use Rimba\Wfm\Models\ManpowerRequest;
class CreateManpowerRequest
{
    public function execute(array $data): ManpowerRequest
    {
        return ManpowerRequest::create($data);
    }
}

