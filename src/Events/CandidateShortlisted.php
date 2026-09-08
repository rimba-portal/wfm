<?php

namespace Rimba\Wfm\Events;
class CandidateShortlisted
{
    public function __construct(public int $candidateId) {}
}

