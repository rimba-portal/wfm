<?php

declare(strict_types=1);

namespace Rimba\Wfm\Http\UI\Admin\Resources\TransferRequests;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Rimba\Wfm\Http\UI\Admin\Resources\TransferRequests\Pages\ListTransferRequests;
use Rimba\Wfm\Models\TransferRequest;
use UnitEnum;

class TransferRequestResource extends Resource
{
    protected static ?string $model = TransferRequest::class;

    protected static string|UnitEnum|null $navigationGroup = 'Wfm';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-play';

    protected static ?int $navigationSort = 67;

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
            'index' => ListTransferRequests::route('/'),
            // 'create' => \Rimba\Wfm\Http\UI\Admin\Resources\TransferRequests\Pages\CreateTransferRequest::route('/create'),
            // 'view' => \Rimba\Wfm\Http\UI\Admin\Resources\TransferRequests\Pages\ViewTransferRequest::route('/{record}'),
            // 'edit' => \Rimba\Wfm\Http\UI\Admin\Resources\TransferRequests\Pages\EditTransferRequest::route('/{record}/edit'),
            //
        ];
    }
}
