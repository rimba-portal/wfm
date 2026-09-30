<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\EmployeeRelationsCases\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeRelationsCases extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\EmployeeRelationsCases\EmployeeRelationsCaseResource::class;

    protected static ?string $title = 'Employee Relations Cases';

    protected ?string $subheading = 'Log internal grievances, resolution outcomes, and audit progress.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
