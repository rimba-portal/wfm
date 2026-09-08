<?php

declare(strict_types=1);

namespace Rimba\Wfm\Events;

class EmploymentArchived
{
    public function __construct(public int $archiveId) {}
}
