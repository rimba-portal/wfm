<?php

namespace Rimba\Wfm\Services;
class RecruitmentService
{
    public function rankCandidates(array $candidates): array
    {
        return collect($candidates)->sortByDesc('score')->values()->all();
    }
}

