<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans;

use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CareerPlanResource extends Resource
{
    protected static ?string $model = \Rimba\Wfm\Models\CareerPlan::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 52;

    protected static ?string $recordTitleAttribute = 'id';

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
            'index' => \Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages\ListCareerPlans::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages\CreateCareerPlan::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages\ViewCareerPlan::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\CareerPlans\Pages\EditCareerPlan::route('/{record}/edit'),
            //
        ];
    }
}
