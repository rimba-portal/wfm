<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans\Pages\ListDevelopmentPlans;
use Rimba\Wfm\Models\DevelopmentPlan;
use UnitEnum;

class DevelopmentPlanResource extends Resource
{
    protected static ?string $model = DevelopmentPlan::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 54;

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
            'index' => ListDevelopmentPlans::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans\Pages\CreateDevelopmentPlan::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans\Pages\ViewDevelopmentPlan::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\DevelopmentPlans\Pages\EditDevelopmentPlan::route('/{record}/edit'),
            //
        ];
    }
}
