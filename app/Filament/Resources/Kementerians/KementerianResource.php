<?php

namespace App\Filament\Resources\Kementerians;

use App\Filament\Resources\Kementerians\Pages\CreateKementerian;
use App\Filament\Resources\Kementerians\Pages\EditKementerian;
use App\Filament\Resources\Kementerians\Pages\ListKementerians;
use App\Filament\Resources\Kementerians\Schemas\KementerianForm;
use App\Filament\Resources\Kementerians\Tables\KementeriansTable;
use App\Models\Kementerian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KementerianResource extends Resource
{
    protected static ?string $model = Kementerian::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return KementerianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KementeriansTable::configure($table);
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
            'index' => ListKementerians::route('/'),
            'create' => CreateKementerian::route('/create'),
            'edit' => EditKementerian::route('/{record}/edit'),
        ];
    }
}
