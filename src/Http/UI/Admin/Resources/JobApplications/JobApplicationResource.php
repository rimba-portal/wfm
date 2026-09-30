<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\JobApplications;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\JobApplications\Pages\ListJobApplications;
use Rimba\Wfm\Models\JobApplication;
use UnitEnum;

class JobApplicationResource extends Resource
{
    protected static ?string $model = JobApplication::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 59;

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
            'index' => ListJobApplications::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\JobApplications\Pages\CreateJobApplication::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\JobApplications\Pages\ViewJobApplication::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\JobApplications\Pages\EditJobApplication::route('/{record}/edit'),
            //
        ];
    }
}
