<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages\ListCareerPlans;
use Rimba\Wfm\Models\CareerPlan;
use UnitEnum;

class CareerPlanResource extends Resource
{
    protected static ?string $model = CareerPlan::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 52;

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
            'index' => ListCareerPlans::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages\CreateCareerPlan::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages\ViewCareerPlan::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages\EditCareerPlan::route('/{record}/edit'),
            //
        ];
    }
}
