<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\SeparationRequests\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSeparationRequests extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\SeparationRequests\SeparationRequestResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
