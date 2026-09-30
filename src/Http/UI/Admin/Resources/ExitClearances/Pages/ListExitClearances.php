<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\ExitClearances\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\ExitClearances\ExitClearanceResource;

class ListExitClearances extends ListRecords
{
    protected static string $resource = ExitClearanceResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
