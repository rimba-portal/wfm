<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\CompensationReviews\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\CompensationReviews\CompensationReviewResource;

class ListCompensationReviews extends ListRecords
{
    protected static string $resource = CompensationReviewResource::class;

    protected static ?string $title = 'Compensation Reviews';

    protected ?string $subheading = 'Audit wage adjustments, proposed payment packages, and approval steps.';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
