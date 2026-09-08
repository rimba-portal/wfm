<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rimba\People\Models\Staff;
use Rimba\Position\Models\JobPosition;

abstract class StaffLifecycleModel extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['staff_id' => 'integer', 'job_position_id' => 'integer', 'start_date' => 'date', 'end_date' => 'date', 'attributes' => 'array'];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function jobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class);
    }
}
