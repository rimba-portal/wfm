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

class WorkforceRequirement extends Model
{
    use HasFactory;

    protected $table = 'wfm_workforce_requirements';

    protected function casts(): array
    {
        return [
            'workforce_plan_id' => 'integer',
            'org_unit_id' => 'integer',
            'org_team_id' => 'integer',
            'job_position_id' => 'integer',
            'required_count' => 'integer',
            'current_count' => 'integer',
            'priority' => 'integer',
            'effective_from' => 'date',
            'effective_to' => 'date',
            'attributes' => 'array',
        ];
    }

    public function workforcePlan(): BelongsTo
    {
        return $this->belongsTo(WorkforcePlan::class);
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

    public function manpowerRequests(): HasMany
    {
        return $this->hasMany(ManpowerRequest::class);
    }

    public function getGapAttribute(): int
    {
        return max(0, $this->required_count - $this->current_count);
    }
}

