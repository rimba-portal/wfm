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

class CandidateShortlist extends Model
{
    use HasFactory;

    protected $table = 'wfm_candidate_shortlists';

    protected function casts(): array
    {
        return [
            'manpower_request_id' => 'integer',
            'job_position_id' => 'integer',
            'prepared_by_id' => 'integer',
            'prepared_at' => 'datetime',
            'approved_by_id' => 'integer',
            'approved_at' => 'datetime',
            'attributes' => 'array',
        ];
    }

    public function manpowerRequest(): BelongsTo
    {
        return $this->belongsTo(ManpowerRequest::class);
    }
    public function jobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class);
    }
    public function preparedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'prepared_by_id');
    }
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }
    public function items(): HasMany
    {
        return $this->hasMany(CandidateShortlistItem::class)->orderBy('ranking');
    }
}

