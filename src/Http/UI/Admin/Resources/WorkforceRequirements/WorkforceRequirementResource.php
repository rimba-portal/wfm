<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\WorkforceRequirements;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\WorkforceRequirements\Pages\ListWorkforceRequirements;
use Rimba\Wfm\Models\WorkforceRequirement;
use UnitEnum;

class WorkforceRequirementResource extends Resource
{
    protected static ?string $model = WorkforceRequirement::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 71;

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
            'index' => ListWorkforceRequirements::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\WorkforceRequirements\Pages\CreateWorkforceRequirement::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\WorkforceRequirements\Pages\ViewWorkforceRequirement::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\WorkforceRequirements\Pages\EditWorkforceRequirement::route('/{record}/edit'),
            //
        ];
    }
}
