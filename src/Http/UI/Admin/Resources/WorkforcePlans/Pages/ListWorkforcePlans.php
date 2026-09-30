<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\WorkforcePlans\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkforcePlans extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\WorkforcePlans\WorkforcePlanResource::class;

    protected static ?string $title = 'Workforce Plans';

    protected ?string $subheading = 'Forecast strategic annual team budget frameworks and duration ranges.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
