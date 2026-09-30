<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests\Pages\ListPromotionRequests;
use Rimba\Wfm\Models\PromotionRequest;
use UnitEnum;

class PromotionRequestResource extends Resource
{
    protected static ?string $model = PromotionRequest::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 62;

    protected static ?string $recordTitleAttribute = 'x';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPromotionRequests::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests\Pages\CreatePromotionRequest::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests\Pages\ViewPromotionRequest::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\PromotionRequests\Pages\EditPromotionRequest::route('/{record}/edit'),
            //
        ];
    }
}
