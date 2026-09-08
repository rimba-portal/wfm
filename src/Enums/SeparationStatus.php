<?php

declare(strict_types=1);

namespace Rimba\Wfm\Enums;

enum SeparationStatus: string
{
    case Draft = 'draft';
    case Approved = 'approved';
    case Completed = 'completed';
}
