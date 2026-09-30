<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems\Pages\ListExitClearanceItems;
use Rimba\Wfm\Models\ExitClearanceItem;
use UnitEnum;

class ExitClearanceItemResource extends Resource
{
    protected static ?string $model = ExitClearanceItem::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 58;

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
            'index' => ListExitClearanceItems::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems\Pages\CreateExitClearanceItem::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems\Pages\ViewExitClearanceItem::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\ExitClearanceItems\Pages\EditExitClearanceItem::route('/{record}/edit'),
            //
        ];
    }
}
