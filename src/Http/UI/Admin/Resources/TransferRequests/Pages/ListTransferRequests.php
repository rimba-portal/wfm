<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\TransferRequests\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransferRequests extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\TransferRequests\TransferRequestResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
