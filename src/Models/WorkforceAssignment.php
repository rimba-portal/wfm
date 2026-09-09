<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rimba\Agreement\Models\Agreement;
use Rimba\Organization\Models\OrgCorp;
use Rimba\Organization\Models\OrgTeam;
use Rimba\Organization\Models\OrgUnit;
use Rimba\People\Models\Staff;
use Rimba\Position\Models\JobPosition;
use Rimba\Time\Models\Shift;
use Rimba\Wfm\Enums\WorkforceAssignmentStatus;

#[Table(name: 'wfm_workforce_assignments')]
#[Fillable(['uuid', 'staff_id', 'org_corp_id', 'org_unit_id', 'org_team_id', 'job_position_id', 'manager_staff_id', 'agreement_id', 'shift_id', 'assignment_type', 'status', 'effective_from', 'effective_to', 'is_primary', 'source', 'source_reference', 'attributes'])]
class WorkforceAssignment extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'staff_id' => 'integer', 'org_corp_id' => 'integer', 'org_unit_id' => 'integer', 'org_team_id' => 'integer',
            'job_position_id' => 'integer', 'manager_staff_id' => 'integer', 'agreement_id' => 'integer', 'shift_id' => 'integer',
            'status' => WorkforceAssignmentStatus::class, 'effective_from' => 'date', 'effective_to' => 'date',
            'is_primary' => 'boolean', 'attributes' => 'array',
        ];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function orgCorp(): BelongsTo
    {
        return $this->belongsTo(OrgCorp::class);
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

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'manager_staff_id');
    }

    public function agreement(): BelongsTo
    {
        return $this->belongsTo(Agreement::class);
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(WorkforceEvent::class);
    }
}
