<?php

declare(strict_types=1);

namespace Rimba\Wfm\Services;

use Rimba\People\Models\Staff;
use Rimba\Wfm\Actions\AssignWorkforce;
use Rimba\Wfm\Actions\ChangeReportingLine;
use Rimba\Wfm\Actions\ChangeWorkforceShift;
use Rimba\Wfm\Actions\PromoteWorkforce;
use Rimba\Wfm\Actions\TransferWorkforce;

final readonly class WorkforceReconciliationService
{
    public function __construct(
        private WorkforceStateResolver $workforceStateResolver,
        private AssignWorkforce $assignWorkforce,
        private TransferWorkforce $transferWorkforce,
        private PromoteWorkforce $promoteWorkforce,
        private ChangeReportingLine $changeReportingLine,
        private ChangeWorkforceShift $changeWorkforceShift,
    ) {}

    public function reconcile(Staff $staff): void
    {
        $state = $this->workforceStateResolver->resolve($staff);

        $assignment = $staff
            ->currentWorkforceAssignment()
            ->first();

        if (! $assignment) {

            $this->assignWorkforce->execute(
                $staff->id,
                $state
            );

            return;
        }

        if ($assignment->org_unit_id !== $state['org_unit_id']) {

            $this->transferWorkforce->execute(
                $staff->id,
                [
                    'org_unit_id' => $state['org_unit_id'],
                ]
            );

            return;
        }

        if ($assignment->job_position_id !== $state['job_position_id']) {

            $this->promoteWorkforce->execute(
                $staff->id,
                [
                    'job_position_id' => $state['job_position_id'],
                ]
            );

            return;
        }

        if ($assignment->manager_staff_id !== $state['manager_staff_id']) {

            $this->changeReportingLine->execute(
                $staff->id,
                $state['manager_staff_id']
            );

            return;
        }

        if ($assignment->shift_id !== $state['shift_id']) {

            $this->changeWorkforceShift->execute(
                $staff->id,
                $state['shift_id']
            );
        }
    }
}
