<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Rimba\People\Models\Staff;
use Rimba\Wfm\Enums\WorkforceEventType;

#[Table(name: 'wfm_workforce_events')]
#[Fillable(['uuid', 'staff_id', 'workforce_assignment_id', 'event_type', 'effective_at', 'source', 'source_reference', 'triggerable_type', 'triggerable_id', 'before_state', 'after_state', 'remarks', 'recorded_by_id', 'attributes'])]
class WorkforceEvent extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'staff_id' => 'integer', 'workforce_assignment_id' => 'integer', 'event_type' => WorkforceEventType::class,
            'effective_at' => 'datetime', 'triggerable_id' => 'integer', 'before_state' => 'array', 'after_state' => 'array',
            'recorded_by_id' => 'integer', 'attributes' => 'array',
        ];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(WorkforceAssignment::class, 'workforce_assignment_id');
    }

    public function triggerable(): MorphTo
    {
        return $this->morphTo();
    }

    public function recordedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recorded_by_id');
    }
}
