<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlists\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlists\CandidateShortlistResource;

class ListCandidateShortlists extends ListRecords
{
    protected static string $resource = CandidateShortlistResource::class;

    protected static ?string $title = 'Candidate Shortlists';

    protected ?string $subheading = 'Process candidate groups matching targeted recruitment profiles.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
