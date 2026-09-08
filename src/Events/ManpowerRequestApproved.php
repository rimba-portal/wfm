<?php

namespace Rimba\Wfm\Events;
class ManpowerRequestApproved
{
    public function __construct(public int $manpowerRequestId) {}
}

