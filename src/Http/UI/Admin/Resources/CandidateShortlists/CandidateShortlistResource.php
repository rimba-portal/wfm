<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlists;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlists\Pages\ListCandidateShortlists;
use Rimba\Wfm\Models\CandidateShortlist;
use UnitEnum;

class CandidateShortlistResource extends Resource
{
    protected static ?string $model = CandidateShortlist::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 50;

    protected static ?string $recordTitleAttribute = 'code';

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
            'index' => ListCandidateShortlists::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlists\Pages\CreateCandidateShortlist::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlists\Pages\ViewCandidateShortlist::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\CandidateShortlists\Pages\EditCandidateShortlist::route('/{record}/edit'),
            //
        ];
    }
}
