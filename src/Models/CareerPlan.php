<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rimba\Position\Models\JobPosition;

#[Table(name: 'wfm_career_plans')]
class CareerPlan extends StaffLifecycleModel
{
    public function targetJobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class, 'target_job_position_id');
    }
}
