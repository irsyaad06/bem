<?php

namespace App\Filament\Resources\Kemenkoans;

use App\Filament\Resources\Kemenkoans\Pages\CreateKemenkoan;
use App\Filament\Resources\Kemenkoans\Pages\EditKemenkoan;
use App\Filament\Resources\Kemenkoans\Pages\ListKemenkoans;
use App\Filament\Resources\Kemenkoans\Schemas\KemenkoanForm;
use App\Filament\Resources\Kemenkoans\Tables\KemenkoansTable;
use App\Models\Kemenkoan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class KemenkoanResource extends Resource
{
    protected static ?string $model = Kemenkoan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowsPointingOut;

    protected static string | UnitEnum | null $navigationGroup = 'Struktur Organisasi';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Data Kemenkoan';

    public static function form(Schema $schema): Schema
    {
        return KemenkoanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KemenkoansTable::configure($table);
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
            'index' => ListKemenkoans::route('/'),
            'create' => CreateKemenkoan::route('/create'),
            'edit' => EditKemenkoan::route('/{record}/edit'),
        ];
    }
}
