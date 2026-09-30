<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlistItems\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCandidateShortlistItems extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlistItems\CandidateShortlistItemResource::class;

    protected static ?string $title = 'Shortlist Evaluation Items';

    protected ?string $subheading = 'Evaluate item scores, individual candidate rankings, and reviews.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
