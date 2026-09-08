<?php

declare(strict_types=1);

namespace Rimba\Wfm\Events;

class CandidateShortlisted
{
    public function __construct(public int $candidateId) {}
}
