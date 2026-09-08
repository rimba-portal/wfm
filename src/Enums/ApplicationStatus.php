<?php

declare(strict_types=1);

namespace Rimba\Wfm\Enums;

enum ApplicationStatus: string
{
    case Applied = 'applied';
    case Shortlisted = 'shortlisted';
    case Offered = 'offered';
    case Rejected = 'rejected';
}
