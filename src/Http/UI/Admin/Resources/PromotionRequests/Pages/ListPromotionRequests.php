<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests\PromotionRequestResource;

class ListPromotionRequests extends ListRecords
{
    protected static string $resource = PromotionRequestResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
