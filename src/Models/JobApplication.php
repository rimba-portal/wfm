<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Rimba\Agreement\Models\Agreement;
use Rimba\Organization\Models\OrgCorp;
use Rimba\Organization\Models\OrgTeam;
use Rimba\Organization\Models\OrgUnit;
use Rimba\People\Models\Staff;
use Rimba\Position\Models\JobPosition;
use Rimba\Wfm\Enums\ApplicationStatus;
use Rimba\Wfm\Enums\ManpowerRequestStatus;
use Rimba\Wfm\Enums\SeparationStatus;
use Rimba\Wfm\Enums\WorkforcePlanStatus;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'wfm_job_applications';

    protected function casts(): array
    {
        return [
            'candidate_id' => 'integer',
            'manpower_request_id' => 'integer',
            'job_position_id' => 'integer',
            'status' => ApplicationStatus::class,
            'applied_at' => 'datetime',
            'withdrawn_at' => 'datetime',
            'profile_snapshot' => 'array',
            'attributes' => 'array',
        ];
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
        return $this->hasOne(Agreement::class, 'reference_id')
            ->where('reference_type', self::class);
    }
}

