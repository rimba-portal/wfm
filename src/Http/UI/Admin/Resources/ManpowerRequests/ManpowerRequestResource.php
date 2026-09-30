<?php

namespace Rimba\Wfm\Http\UI\Admin\Resources\ManpowerRequests;

use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ManpowerRequestResource extends Resource
{
    protected static ?string $model = \Rimba\Wfm\Models\ManpowerRequest::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 60;

    protected static ?string $recordTitleAttribute = 'request_no';

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
            'index' => \Rimba\Wfm\Http\UI\Admin\Resources\ManpowerRequests\Pages\ListManpowerRequests::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\ManpowerRequests\Pages\CreateManpowerRequest::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\ManpowerRequests\Pages\ViewManpowerRequest::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\ManpowerRequests\Pages\EditManpowerRequest::route('/{record}/edit'),
            //
        ];
    }
}
