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

class EmploymentArchive extends Model
{
    use HasFactory;

    protected $table = 'wfm_employment_archives';

    protected function casts(): array
    {
        return [
            'staff_id' => 'integer',
            'separation_request_id' => 'integer',
            'archived_by_id' => 'integer',
            'archived_at' => 'datetime',
            'rehire_eligible' => 'boolean',
            'staff_snapshot' => 'array',
            'agreement_snapshot' => 'array',
            'job_position_snapshot' => 'array',
            'attributes' => 'array',
        ];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
    public function separationRequest(): BelongsTo
    {
        return $this->belongsTo(SeparationRequest::class);
    }
    public function archivedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'archived_by_id');
    }
}

