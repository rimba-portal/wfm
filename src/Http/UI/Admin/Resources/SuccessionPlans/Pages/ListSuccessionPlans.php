<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\SuccessionPlans\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSuccessionPlans extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\SuccessionPlans\SuccessionPlanResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
