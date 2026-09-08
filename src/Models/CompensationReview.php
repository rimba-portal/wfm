<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(name: 'wfm_compensation_reviews')]
#[Fillable(['staff_id', 'job_position_id', 'reviewed_by_id', 'effective_date', 'status', 'current_package', 'proposed_package', 'attributes'])]
class CompensationReview extends StaffLifecycleModel
{
    protected function casts(): array
    {
        return array_merge(parent::casts(), ['reviewed_by_id' => 'integer', 'effective_date' => 'date', 'current_package' => 'array', 'proposed_package' => 'array']);
    }

    public function reviewedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by_id');
    }
}
