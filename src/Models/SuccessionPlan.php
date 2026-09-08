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

class SuccessionPlan extends Model
{
    use HasFactory;

    protected $table = 'wfm_succession_plans';

    protected function casts(): array
    {
        return [
            'job_position_id' => 'integer',
            'owner_staff_id' => 'integer',
            'review_date' => 'date',
            'requirements' => 'array',
            'attributes' => 'array',
        ];
    }

    public function jobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class);
    }
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'owner_staff_id');
    }
    public function successors(): HasMany
    {
        return $this->hasMany(SuccessionCandidate::class);
    }
}

