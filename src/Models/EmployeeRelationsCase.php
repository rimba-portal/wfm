<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(name: 'wfm_employee_relations_cases')]
class EmployeeRelationsCase extends StaffLifecycleModel
{
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'opened_by_id' => 'integer',
            'assigned_to_id' => 'integer',
            'opened_at' => 'datetime',
            'closed_at' => 'datetime',
        ]);
    }

    public function openedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'opened_by_id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }
}
