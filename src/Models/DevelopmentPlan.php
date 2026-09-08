<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;

#[Table(name: 'wfm_development_plans')]
#[Fillable(['staff_id', 'job_position_id', 'status', 'start_date', 'end_date', 'objectives', 'attributes'])]
class DevelopmentPlan extends StaffLifecycleModel
{
    protected function casts(): array
    {
        return array_merge(parent::casts(), ['objectives' => 'array']);
    }
}
