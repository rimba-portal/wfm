<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\StaffLifecycleModels;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\StaffLifecycleModels\Pages\ListStaffLifecycleModels;
use Rimba\Wfm\Models\StaffLifecycleModel;
use UnitEnum;

class StaffLifecycleModelResource extends Resource
{
    protected static ?string $model = StaffLifecycleModel::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 64;

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
            'index' => ListStaffLifecycleModels::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\StaffLifecycleModels\Pages\CreateStaffLifecycleModel::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\StaffLifecycleModels\Pages\ViewStaffLifecycleModel::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\StaffLifecycleModels\Pages\EditStaffLifecycleModel::route('/{record}/edit'),
            //
        ];
    }
}
