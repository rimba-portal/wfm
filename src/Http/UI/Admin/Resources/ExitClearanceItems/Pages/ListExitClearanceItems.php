<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems\ExitClearanceItemResource;

class ListExitClearanceItems extends ListRecords
{
    protected static string $resource = ExitClearanceItemResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
