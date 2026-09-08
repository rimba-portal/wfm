<?php

namespace Rimba\Wfm\Events;
class EmploymentArchived
{
    public function __construct(public int $archiveId) {}
}

