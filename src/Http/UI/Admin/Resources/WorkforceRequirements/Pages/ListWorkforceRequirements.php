<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\WorkforceRequirements\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkforceRequirements extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\WorkforceRequirements\WorkforceRequirementResource::class;

    protected static ?string $title = 'Workforce Headcount Demands';

    protected ?string $subheading = 'Track target hiring gaps by cross-referencing headcounts.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
