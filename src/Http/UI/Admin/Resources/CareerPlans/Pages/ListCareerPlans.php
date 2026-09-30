<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\CareerPlanResource;

class ListCareerPlans extends ListRecords
{
    protected static string $resource = CareerPlanResource::class;

    protected static ?string $title = 'Career Paths';

    protected ?string $subheading = 'Model milestones, employee objective frameworks, and promotion tracks.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
