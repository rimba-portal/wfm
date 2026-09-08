<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rimba\Agreement\Models\Agreement;
use Rimba\Organization\Models\OrgUnit;
use Rimba\People\Models\Staff;
use Rimba\Position\Models\JobPosition;

#[Table(name: 'wfm_transfer_requests')]
#[Fillable(['staff_id', 'from_job_position_id', 'to_job_position_id', 'from_org_unit_id', 'to_org_unit_id', 'mobility_type', 'status', 'requested_by_id', 'approved_by_id', 'effective_date', 'job_agreement_id', 'reason', 'attributes'])] class TransferRequest extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['staff_id' => 'integer', 'from_job_position_id' => 'integer', 'to_job_position_id' => 'integer', 'from_org_unit_id' => 'integer', 'to_org_unit_id' => 'integer', 'requested_by_id' => 'integer', 'approved_by_id' => 'integer', 'effective_date' => 'date', 'job_agreement_id' => 'integer', 'attributes' => 'array'];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function fromJobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class, 'from_job_position_id');
    }

    public function toJobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class, 'to_job_position_id');
    }

    public function fromOrgUnit(): BelongsTo
    {
        return $this->belongsTo(OrgUnit::class, 'from_org_unit_id');
    }

    public function toOrgUnit(): BelongsTo
    {
        return $this->belongsTo(OrgUnit::class, 'to_org_unit_id');
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function jobAgreement(): BelongsTo
    {
        return $this->belongsTo(Agreement::class, 'job_agreement_id');
    }
}
