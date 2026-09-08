<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Rimba\Agreement\Models\Agreement;
use Rimba\Organization\Models\OrgCorp;
use Rimba\Organization\Models\OrgTeam;
use Rimba\Organization\Models\OrgUnit;
use Rimba\People\Models\Staff;
use Rimba\Position\Models\JobPosition;
use Rimba\Wfm\Enums\ApplicationStatus;
use Rimba\Wfm\Enums\ManpowerRequestStatus;
use Rimba\Wfm\Enums\SeparationStatus;
use Rimba\Wfm\Enums\WorkforcePlanStatus;

class ExitClearance extends Model
{
    use HasFactory;

    protected $table = 'wfm_exit_clearances';

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

