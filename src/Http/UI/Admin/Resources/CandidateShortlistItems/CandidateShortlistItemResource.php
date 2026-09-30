<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlistItems;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlistItems\Pages\ListCandidateShortlistItems;
use Rimba\Wfm\Models\CandidateShortlistItem;
use UnitEnum;

class CandidateShortlistItemResource extends Resource
{
    protected static ?string $model = CandidateShortlistItem::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 51;

    protected static ?string $recordTitleAttribute = 'id';

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
            'index' => ListCandidateShortlistItems::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlistItems\Pages\CreateCandidateShortlistItem::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlistItems\Pages\ViewCandidateShortlistItem::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlistItems\Pages\EditCandidateShortlistItem::route('/{record}/edit'),
            //
        ];
    }
}
