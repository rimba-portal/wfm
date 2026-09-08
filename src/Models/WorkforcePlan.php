<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rimba\Organization\Models\OrgCorp;
use Rimba\Wfm\Enums\WorkforcePlanStatus;

#[Table(name: 'wfm_workforce_plans')]
#[Fillable(['code', 'name', 'org_corp_id', 'period_start', 'period_end', 'status', 'submitted_by_id', 'submitted_at', 'approved_by_id', 'approved_at', 'attributes'])]
class WorkforcePlan extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['org_corp_id' => 'integer', 'period_start' => 'date', 'period_end' => 'date', 'status' => WorkforcePlanStatus::class, 'submitted_by_id' => 'integer', 'submitted_at' => 'datetime', 'approved_by_id' => 'integer', 'approved_at' => 'datetime', 'attributes' => 'array'];
    }

    public function orgCorp(): BelongsTo
    {
        return $this->belongsTo(OrgCorp::class);
    }

    public function requirements(): HasMany
    {
        return $this->hasMany(WorkforceRequirement::class)->orderBy('priority');
    }

    public function manpowerRequests(): HasMany
    {
        return $this->hasMany(ManpowerRequest::class);
    }

    public function submittedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'submitted_by_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    #[Scope]
    protected function approved(Builder $query): Builder
    {
        return $query->where('status', WorkforcePlanStatus::Approved->value);
    }
}
