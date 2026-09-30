<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\Candidates\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCandidates extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\Candidates\CandidateResource::class;

    protected static ?string $title = 'Talent Pool Candidates';

    protected ?string $subheading = 'Track external hiring applications, profiles, and availability states.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
