<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\ManpowerRequests\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListManpowerRequests extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\ManpowerRequests\ManpowerRequestResource::class;

    protected static ?string $title = 'Manpower Requests';

    protected ?string $subheading = 'Request headcount approvals based on vacant structural units.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
