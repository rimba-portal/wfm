<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rimba\Organization\Models\OrgTeam;
use Rimba\Organization\Models\OrgUnit;
use Rimba\Position\Models\JobPosition;
use Rimba\Wfm\Enums\ManpowerRequestStatus;

#[Table(name: 'wfm_manpower_requests')]
class ManpowerRequest extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'workforce_plan_id' => 'integer',
            'workforce_requirement_id' => 'integer',
            'org_unit_id' => 'integer',
            'org_team_id' => 'integer',
            'job_position_id' => 'integer',
            'required_count' => 'integer',
            'priority' => 'integer',
            'target_date' => 'date',
            'status' => ManpowerRequestStatus::class,
            'requested_by_id' => 'integer',
            'requested_at' => 'datetime',
            'approved_by_id' => 'integer',
            'approved_at' => 'datetime',
            'attributes' => 'array',
        ];
    }

    public function workforcePlan(): BelongsTo
    {
        return $this->belongsTo(WorkforcePlan::class);
    }

    public function workforceRequirement(): BelongsTo
    {
        return $this->belongsTo(WorkforceRequirement::class);
    }

    public function orgUnit(): BelongsTo
    {
        return $this->belongsTo(OrgUnit::class);
    }

    public function orgTeam(): BelongsTo
    {
        return $this->belongsTo(OrgTeam::class);
    }

    public function jobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class);
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function shortlists(): HasMany
    {
        return $this->hasMany(CandidateShortlist::class);
    }
}
