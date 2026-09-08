<?php

declare(strict_types=1);

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\WorkforcePlan;

class CreateWorkforcePlan
{
    public function execute(array $data): WorkforcePlan
    {
        return WorkforcePlan::create($data);
    }
}
