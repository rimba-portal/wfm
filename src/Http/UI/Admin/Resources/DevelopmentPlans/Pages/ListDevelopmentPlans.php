<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans\DevelopmentPlanResource;

class ListDevelopmentPlans extends ListRecords
{
    protected static string $resource = DevelopmentPlanResource::class;

    protected static ?string $title = 'Development Plans';

    protected ?string $subheading = 'Target key growth priorities, timelines, and talent optimization goals.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
