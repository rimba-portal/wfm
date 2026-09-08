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

class PromotionRequest extends Model
{
    use HasFactory;

    protected $table = 'wfm_promotion_requests';

    protected function casts(): array
    {
        return [
            'staff_id' => 'integer',
            'current_job_position_id' => 'integer',
            'target_job_position_id' => 'integer',
            'requested_by_id' => 'integer',
            'approved_by_id' => 'integer',
            'effective_date' => 'date',
            'job_agreement_id' => 'integer',
            'attributes' => 'array',
        ];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
    public function currentJobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class, 'current_job_position_id');
    }
    public function targetJobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class, 'target_job_position_id');
    }
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }
    public function jobAgreement(): BelongsTo
    {
        return $this->belongsTo(Agreement::class, 'job_agreement_id');
    }
}

