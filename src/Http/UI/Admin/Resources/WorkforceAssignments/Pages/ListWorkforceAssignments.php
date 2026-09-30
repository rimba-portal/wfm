<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\WorkforceAssignments\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\WorkforceAssignments\WorkforceAssignmentResource;

class ListWorkforceAssignments extends ListRecords
{
    protected static string $resource = WorkforceAssignmentResource::class;

    protected static ?string $title = 'Workforce Assignments';

    protected ?string $subheading = 'Manage core reporting lines, active work agreements, and contract logs.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
