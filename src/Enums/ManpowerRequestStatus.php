<?php

declare(strict_types=1);

namespace Rimba\Wfm\Enums;

enum ManpowerRequestStatus: string
{
    case Draft = 'draft';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
