<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rimba\People\Models\Staff;

#[Table(name: 'wfm_performance_reviews')]
#[Fillable(['staff_id', 'job_position_id', 'reviewer_staff_id', 'review_period_start', 'review_period_end', 'status', 'rating', 'outcomes', 'attributes'])]
class PerformanceReview extends StaffLifecycleModel
{
    protected function casts(): array
    {
        return array_merge(parent::casts(), ['reviewer_staff_id' => 'integer', 'review_period_start' => 'date', 'review_period_end' => 'date', 'rating' => 'decimal:2', 'outcomes' => 'array']);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'reviewer_staff_id');
    }
}
