<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Rimba\Agreement\Models\Agreement;
use Rimba\Position\Models\JobPosition;
use Rimba\Wfm\Enums\ApplicationStatus;

#[Table(name: 'wfm_job_applications')]
#[Fillable(['candidate_id', 'manpower_request_id', 'job_position_id', 'status', 'applied_at', 'withdrawn_at', 'profile_snapshot', 'attributes'])]
class JobApplication extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['candidate_id' => 'integer', 'manpower_request_id' => 'integer', 'job_position_id' => 'integer', 'status' => ApplicationStatus::class, 'applied_at' => 'datetime', 'withdrawn_at' => 'datetime', 'profile_snapshot' => 'array', 'attributes' => 'array'];
    }

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }

    public function manpowerRequest(): BelongsTo
    {
        return $this->belongsTo(ManpowerRequest::class);
    }

    public function jobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class);
    }

    public function shortlistItems(): HasMany
    {
        return $this->hasMany(CandidateShortlistItem::class);
    }

    public function acceptedOfferAgreement(): HasOne
    {
        return $this->hasOne(Agreement::class, 'reference_id')->where('reference_type', self::class);
    }
}
