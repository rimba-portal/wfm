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

class CandidateShortlistItem extends Model
{
    use HasFactory;

    protected $table = 'wfm_candidate_shortlist_items';

    protected function casts(): array
    {
        return [
            'candidate_shortlist_id' => 'integer',
            'candidate_id' => 'integer',
            'job_application_id' => 'integer',
            'ranking' => 'integer',
            'score' => 'decimal:2',
            'attributes' => 'array',
        ];
    }

    public function shortlist(): BelongsTo
    {
        return $this->belongsTo(CandidateShortlist::class, 'candidate_shortlist_id');
    }
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
    public function jobApplication(): BelongsTo
    {
        return $this->belongsTo(JobApplication::class);
    }
}

