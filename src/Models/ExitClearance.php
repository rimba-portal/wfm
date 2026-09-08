<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rimba\People\Models\Staff;

#[Table(name: 'wfm_exit_clearances')]
class ExitClearance extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'separation_request_id' => 'integer',
            'staff_id' => 'integer',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
            'completed_by_id' => 'integer',
            'summary' => 'array',
            'attributes' => 'array',
        ];
    }

    public function separationRequest(): BelongsTo
    {
        return $this->belongsTo(SeparationRequest::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function completedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'completed_by_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(ExitClearanceItem::class);
    }
}
