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

class PerformanceReview extends StaffLifecycleModel
{
    protected $table = 'wfm_performance_reviews';

    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'reviewer_staff_id' => 'integer',
            'review_period_start' => 'date',
            'review_period_end' => 'date',
            'rating' => 'decimal:2',
            'outcomes' => 'array',
        ]);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'reviewer_staff_id');
    }
}

