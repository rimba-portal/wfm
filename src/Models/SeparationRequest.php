<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Rimba\Agreement\Models\Agreement;
use Rimba\People\Models\Staff;
use Rimba\Wfm\Enums\SeparationStatus;

#[Table(name: 'wfm_separation_requests')]
#[Fillable(['staff_id', 'staff_agreement_id', 'reason', 'effective_date', 'last_working_date', 'status', 'requested_by_id', 'requested_at', 'approved_by_id', 'approved_at', 'remarks', 'attributes'])] class SeparationRequest extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['staff_id' => 'integer', 'staff_agreement_id' => 'integer', 'effective_date' => 'date', 'last_working_date' => 'date', 'status' => SeparationStatus::class, 'requested_by_id' => 'integer', 'requested_at' => 'datetime', 'approved_by_id' => 'integer', 'approved_at' => 'datetime', 'attributes' => 'array'];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function staffAgreement(): BelongsTo
    {
        return $this->belongsTo(Agreement::class, 'staff_agreement_id');
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function exitClearance(): HasOne
    {
        return $this->hasOne(ExitClearance::class);
    }

    public function employmentArchive(): HasOne
    {
        return $this->hasOne(EmploymentArchive::class);
    }
}
