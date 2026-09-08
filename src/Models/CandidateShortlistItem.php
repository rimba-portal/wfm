<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(name: 'wfm_candidate_shortlist_items')]
class CandidateShortlistItem extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'candidate_shortlist_id' => 'integer',
            'candidate_id' => 'integer',
            'job_application_id' => 'integer',
            'ranking' => 'integer',
            'score' => 'decimal:2',
            'attributes' => 'array',
        ];
    }

    public function shortlist(): BelongsTo
    {
        return $this->belongsTo(CandidateShortlist::class, 'candidate_shortlist_id');
    }

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }

    public function jobApplication(): BelongsTo
    {
        return $this->belongsTo(JobApplication::class);
    }
}
