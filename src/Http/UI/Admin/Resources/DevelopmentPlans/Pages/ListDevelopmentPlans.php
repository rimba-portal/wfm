<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDevelopmentPlans extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans\DevelopmentPlanResource::class;

    protected static ?string $title = 'Development Plans';

    protected ?string $subheading = 'Target key growth priorities, timelines, and talent optimization goals.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
