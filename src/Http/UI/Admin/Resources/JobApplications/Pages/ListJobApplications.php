<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\JobApplications\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\JobApplications\JobApplicationResource;

class ListJobApplications extends ListRecords
{
    protected static string $resource = JobApplicationResource::class;

    protected static ?string $title = 'Job Applications';

    protected ?string $subheading = 'Track recruitment timelines, applicant snapshots, and open vacancies.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
