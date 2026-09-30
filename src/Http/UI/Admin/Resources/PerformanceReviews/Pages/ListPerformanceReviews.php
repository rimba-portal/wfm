<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\PerformanceReviews\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\PerformanceReviews\PerformanceReviewResource;

class ListPerformanceReviews extends ListRecords
{
    protected static string $resource = PerformanceReviewResource::class;

    protected static ?string $title = 'Performance Reviews';

    protected ?string $subheading = 'Log structural evaluation criteria, periods, and score results.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
