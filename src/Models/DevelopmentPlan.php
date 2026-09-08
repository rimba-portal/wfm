<?php

declare(strict_types=1);

namespace Rimba\Wfm\Models;

use Illuminate\Database\Eloquent\Attributes\Table;

#[Table(name: 'wfm_development_plans')]
class DevelopmentPlan extends StaffLifecycleModel {}
