<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\Candidates\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\Candidates\CandidateResource;

class ListCandidates extends ListRecords
{
    protected static string $resource = CandidateResource::class;

    protected static ?string $title = 'Talent Pool Candidates';

    protected ?string $subheading = 'Track external hiring applications, profiles, and availability states.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
