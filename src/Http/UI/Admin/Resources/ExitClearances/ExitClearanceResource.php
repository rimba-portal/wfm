<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\ExitClearances;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\ExitClearances\Pages\ListExitClearances;
use Rimba\Wfm\Models\ExitClearance;
use UnitEnum;

class ExitClearanceResource extends Resource
{
    protected static ?string $model = ExitClearance::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 57;

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
            'index' => ListExitClearances::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\ExitClearances\Pages\CreateExitClearance::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\ExitClearances\Pages\ViewExitClearance::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\ExitClearances\Pages\EditExitClearance::route('/{record}/edit'),
            //
        ];
    }
}
