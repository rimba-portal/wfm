<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(name: 'wfm_employee_relations_cases')]
#[Fillable(['case_no', 'staff_id', 'job_position_id', 'case_type', 'status', 'opened_by_id', 'assigned_to_id', 'opened_at', 'closed_at', 'summary', 'resolution', 'attributes'])]
class EmployeeRelationsCase extends StaffLifecycleModel
{
    protected function casts(): array
    {
        return array_merge(parent::casts(), ['opened_by_id' => 'integer', 'assigned_to_id' => 'integer', 'opened_at' => 'datetime', 'closed_at' => 'datetime']);
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
