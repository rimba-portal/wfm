<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(name: 'wfm_exit_clearance_items')]
#[Fillable(['exit_clearance_id', 'code', 'name', 'owner_type', 'owner_id', 'status', 'completed_by_id', 'completed_at', 'remarks', 'attributes'])] class ExitClearanceItem extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['exit_clearance_id' => 'integer', 'owner_id' => 'integer', 'completed_by_id' => 'integer', 'completed_at' => 'datetime', 'attributes' => 'array'];
    }

    public function exitClearance(): BelongsTo
    {
        return $this->belongsTo(ExitClearance::class);
    }

    public function completedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'completed_by_id');
    }
}
