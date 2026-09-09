<?php

declare(strict_types=1);

namespace Rimba\Wfm\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Rimba\Wfm\Enums\WorkforceAssignmentStatus;
use Rimba\Wfm\Models\WorkforceAssignment;
use Rimba\Wfm\Models\WorkforceEvent;

trait HasWorkforceLifecycle
{
    public function workforceAssignments(): HasMany
    {
        return $this->hasMany(WorkforceAssignment::class, 'staff_id');
    }

    public function currentWorkforceAssignment(): HasOne
    {
        return $this->hasOne(WorkforceAssignment::class, 'staff_id')->ofMany('id', 'max', fn ($q) => $q->where('status', WorkforceAssignmentStatus::Active->value)->where('is_primary', true));
    }

    public function workforceEvents(): HasMany
    {
        return $this->hasMany(WorkforceEvent::class, 'staff_id')->orderByDesc('effective_at');
    }
}
