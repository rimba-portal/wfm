<?php

namespace Rimba\Wfm\Services;
class WorkforcePlanningService
{
    public function calculateGap(int $required, int $current): int
    {
        return $required - $current;
    }
}

