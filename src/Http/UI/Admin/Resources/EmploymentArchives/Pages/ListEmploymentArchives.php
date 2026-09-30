<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\EmploymentArchives\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\EmploymentArchives\EmploymentArchiveResource;

class ListEmploymentArchives extends ListRecords
{
    protected static string $resource = EmploymentArchiveResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
