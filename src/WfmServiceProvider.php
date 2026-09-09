<?php

declare(strict_types=1);

namespace Rimba\Wfm;

use Illuminate\Support\Facades\Event;
use Rimba\Base\Services\BitesServiceProvider;
use Rimba\Wfm\Console\Commands\WorkforceAssignmentsCommand;
use Rimba\Wfm\Events\WorkforceAssignmentChanged;
use Rimba\Wfm\Listeners\RecordAssignmentEvent;
use Rimba\Wfm\Services\WorkforceAssignmentService;

class WfmServiceProvider extends BitesServiceProvider
{
    protected function bootPackage(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->commands([WorkforceAssignmentsCommand::class]);
        Event::listen(WorkforceAssignmentChanged::class, RecordAssignmentEvent::class);

    }

    protected function registerPackage(): void
    {
        $this->app->singleton(WorkforceAssignmentService::class);

    }
}
