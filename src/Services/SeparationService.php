<?php

declare(strict_types=1);

namespace Rimba\Wfm\Services;

class SeparationService
{
    public function eligibleForArchive(string $status): bool
    {
        return $status === 'completed';
    }
}
