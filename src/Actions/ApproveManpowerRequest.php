<?php

declare(strict_types=1);

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\ManpowerRequest;

class ApproveManpowerRequest
{
    public function execute(ManpowerRequest $request): ManpowerRequest
    {
        $request->update(['status' => 'approved']);

        return $request;
    }
}
