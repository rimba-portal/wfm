<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\EmployeeRelationsCases;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\EmployeeRelationsCases\Pages\ListEmployeeRelationsCases;
use Rimba\Wfm\Models\EmployeeRelationsCase;
use UnitEnum;

class EmployeeRelationsCaseResource extends Resource
{
    protected static ?string $model = EmployeeRelationsCase::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 55;

    protected static ?string $recordTitleAttribute = 'case_no';

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
            'index' => ListEmployeeRelationsCases::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\EmployeeRelationsCases\Pages\CreateEmployeeRelationsCase::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\EmployeeRelationsCases\Pages\ViewEmployeeRelationsCase::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\EmployeeRelationsCases\Pages\EditEmployeeRelationsCase::route('/{record}/edit'),
            //
        ];
    }
}
