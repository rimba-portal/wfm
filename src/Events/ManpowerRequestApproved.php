<?php

declare(strict_types=1);

namespace Rimba\Wfm\Events;

class ManpowerRequestApproved
{
    public function __construct(public int $manpowerRequestId) {}
}
