<?php

declare(strict_types=1);

namespace Rimba\Wfm\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Rimba\People\Models\Staff;
use Rimba\Wfm\Services\WorkforceReconciliationService;

#[Description('Reconcile Staff records into Workforce Assignments and Workforce Events')]
#[Signature('wfm:reconcile {--staff=}')]
final class WorkforceReconcileCommand extends Command
{
    public function __construct(
        private readonly WorkforceReconciliationService $workforceReconciliationService,
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $processed = 0;

        if ($staff = $this->option('staff')) {

            Staff::query()
                ->where('staff_no', $staff)
                ->orWhere('uuid', $staff)
                ->chunkById(100, function ($rows) use (&$processed): void {

                    foreach ($rows as $row) {

                        $this->workforceReconciliationService
                            ->reconcile($row);

                        $processed++;
                    }
                });

        } else {

            Staff::query()
                ->chunkById(100, function ($rows) use (&$processed): void {

                    foreach ($rows as $row) {

                        $this->workforceReconciliationService
                            ->reconcile($row);

                        $processed++;
                    }
                });
        }

        $this->info("Processed {$processed} staff.");

        return self::SUCCESS;
    }
}
