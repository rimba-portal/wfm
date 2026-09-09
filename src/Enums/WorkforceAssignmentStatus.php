<?php

declare(strict_types=1);

namespace Rimba\Wfm\Enums;

enum WorkforceAssignmentStatus: string
{
    case Planned = 'planned';
    case Active = 'active';
    case Suspended = 'suspended';
    case Ended = 'ended';
    case Cancelled = 'cancelled';
}
