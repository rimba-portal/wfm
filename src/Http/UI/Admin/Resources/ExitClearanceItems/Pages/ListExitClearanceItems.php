<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExitClearanceItems extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems\ExitClearanceItemResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
