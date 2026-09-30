<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\WorkforceEvents\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\WorkforceEvents\WorkforceEventResource;

class ListWorkforceEvents extends ListRecords
{
    protected static string $resource = WorkforceEventResource::class;

    protected static ?string $title = 'Workforce Lifecycle Events';

    protected ?string $subheading = 'Log structural status events, rehires, or internal job transfers.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
