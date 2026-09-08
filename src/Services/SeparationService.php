<?php

namespace Rimba\Wfm\Services;
class SeparationService
{
    public function eligibleForArchive(string $status): bool
    {
        return $status === 'completed';
    }
}

