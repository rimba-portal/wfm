<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\StaffLifecycleModels\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\StaffLifecycleModels\StaffLifecycleModelResource;

class ListStaffLifecycleModels extends ListRecords
{
    protected static string $resource = StaffLifecycleModelResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
