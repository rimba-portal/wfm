<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rimba\Position\Models\JobPosition;

#[Table(name: 'wfm_career_plans')]
#[Fillable(['staff_id', 'job_position_id', 'target_job_position_id', 'status', 'start_date', 'end_date', 'objectives', 'attributes'])]
class CareerPlan extends StaffLifecycleModel
{
    protected function casts(): array
    {
        return array_merge(parent::casts(), ['target_job_position_id' => 'integer', 'objectives' => 'array']);
    }

    public function targetJobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class, 'target_job_position_id');
    }
}
