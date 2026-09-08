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

class SuccessionCandidate extends Model
{
    use HasFactory;

    protected $table = 'wfm_succession_candidates';

    protected function casts(): array
    {
        return [
            'succession_plan_id' => 'integer',
            'staff_id' => 'integer',
            'ranking' => 'integer',
            'target_ready_date' => 'date',
            'development_actions' => 'array',
            'attributes' => 'array',
        ];
    }

    public function successionPlan(): BelongsTo
    {
        return $this->belongsTo(SuccessionPlan::class);
    }
    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}

