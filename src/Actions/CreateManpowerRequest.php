<?php

declare(strict_types=1);

namespace Rimba\Wfm\Actions;

use Rimba\Wfm\Models\ManpowerRequest;

class CreateManpowerRequest
{
    public function execute(array $data): ManpowerRequest
    {
        return ManpowerRequest::create($data);
    }
}
