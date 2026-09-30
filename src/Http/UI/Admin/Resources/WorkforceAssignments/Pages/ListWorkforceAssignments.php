<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\WorkforceAssignments\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkforceAssignments extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\WorkforceAssignments\WorkforceAssignmentResource::class;

    protected static ?string $title = 'Workforce Assignments';

    protected ?string $subheading = 'Manage core reporting lines, active work agreements, and contract logs.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
