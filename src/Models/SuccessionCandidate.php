<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rimba\People\Models\Staff;

#[Table(name: 'wfm_succession_candidates')]
class SuccessionCandidate extends Model
{
    use HasFactory;

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
