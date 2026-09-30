<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\WorkforcePlans;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\WorkforcePlans\Pages\ListWorkforcePlans;
use Rimba\Wfm\Models\WorkforcePlan;
use UnitEnum;

class WorkforcePlanResource extends Resource
{
    protected static ?string $model = WorkforcePlan::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 70;

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
            'index' => ListWorkforcePlans::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\WorkforcePlans\Pages\CreateWorkforcePlan::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\WorkforcePlans\Pages\ViewWorkforcePlan::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\WorkforcePlans\Pages\EditWorkforcePlan::route('/{record}/edit'),
            //
        ];
    }
}
