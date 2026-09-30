<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromotionRequests extends ListRecords
{
    protected static string $resource = \Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests\PromotionRequestResource::class;

    protected static ?string $title = 'x';

    protected ?string $subheading = 'x';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
