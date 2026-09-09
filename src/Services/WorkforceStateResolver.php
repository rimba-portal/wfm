<?php

declare(strict_types=1);

namespace Rimba\Wfm\Services;

use Rimba\People\Models\Staff;

final class WorkforceStateResolver
{
    public function resolve(Staff $staff): array
    {
        return [
            'staff_id' => $staff->id,
            'org_corp_id' => $staff->org_corp_id,
            'org_unit_id' => $staff->org_unit_id,
            'job_position_id' => $staff->job_position_id,
            'job_contract_id' => $staff->job_contract_id,

            'manager_staff_id' => data_get(
                $staff->attributes,
                'reports_to_staff_id'
            ),

            'shift_id' => data_get(
                $staff->attributes,
                'shift_id'
            ),
        ];
    }
}
