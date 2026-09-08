<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rimba\People\Models\Staff;
use Rimba\Position\Models\JobPosition;

#[Table(name: 'wfm_succession_plans')]
#[Fillable(['job_position_id', 'status', 'owner_staff_id', 'review_date', 'criticality', 'requirements', 'attributes'])] class SuccessionPlan extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['job_position_id' => 'integer', 'owner_staff_id' => 'integer', 'review_date' => 'date', 'requirements' => 'array', 'attributes' => 'array'];
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
