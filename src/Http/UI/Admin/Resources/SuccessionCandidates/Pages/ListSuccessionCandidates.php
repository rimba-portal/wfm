<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\SuccessionCandidates\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSuccessionCandidates extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\SuccessionCandidates\SuccessionCandidateResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
