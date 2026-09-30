<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\SuccessionCandidates;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\SuccessionCandidates\Pages\ListSuccessionCandidates;
use Rimba\Wfm\Models\SuccessionCandidate;
use UnitEnum;

class SuccessionCandidateResource extends Resource
{
    protected static ?string $model = SuccessionCandidate::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 65;

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
            'index' => ListSuccessionCandidates::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\SuccessionCandidates\Pages\CreateSuccessionCandidate::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\SuccessionCandidates\Pages\ViewSuccessionCandidate::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\SuccessionCandidates\Pages\EditSuccessionCandidate::route('/{record}/edit'),
            //
        ];
    }
}
