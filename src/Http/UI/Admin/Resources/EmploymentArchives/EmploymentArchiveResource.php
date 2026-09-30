<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\EmploymentArchives;

use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EmploymentArchiveResource extends Resource
{
    protected static ?string $model = \Rimba\Wfm\Models\EmploymentArchive::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 56;

    protected static ?string $recordTitleAttribute = 'x';

    public static function form(Schema $schema): Schema { return $schema->components([]); }

    public static function infolist(Schema $schema): Schema { return $schema->components([]); }

    public static function table(Table $table): Table { return $table->columns([]); }

    public static function getRelations(): array 
    { 
        return [ 
            // 
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \Rimba\Wfm\Http\UI\Admin\Resources\EmploymentArchives\Pages\ListEmploymentArchives::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\EmploymentArchives\Pages\CreateEmploymentArchive::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\EmploymentArchives\Pages\ViewEmploymentArchive::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\EmploymentArchives\Pages\EditEmploymentArchive::route('/{record}/edit'),
            //
        ];
    }
}
