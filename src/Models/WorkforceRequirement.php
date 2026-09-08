<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rimba\Organization\Models\OrgTeam;
use Rimba\Organization\Models\OrgUnit;
use Rimba\Position\Models\JobPosition;

#[Table(name: 'wfm_workforce_requirements')]
#[Fillable(['workforce_plan_id', 'org_unit_id', 'org_team_id', 'job_position_id', 'required_count', 'current_count', 'priority', 'effective_from', 'effective_to', 'status', 'justification', 'attributes'])]
class WorkforceRequirement extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['workforce_plan_id' => 'integer', 'org_unit_id' => 'integer', 'org_team_id' => 'integer', 'job_position_id' => 'integer', 'required_count' => 'integer', 'current_count' => 'integer', 'priority' => 'integer', 'effective_from' => 'date', 'effective_to' => 'date', 'attributes' => 'array'];
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

    protected function gap(): Attribute
    {
        return Attribute::make(get: fn (): float|int => max(0, $this->required_count - $this->current_count));
    }
}
