<?php

namespace App\Filament\Resources\Tupoksis;

use App\Filament\Resources\Tupoksis\Pages\CreateTupoksi;
use App\Filament\Resources\Tupoksis\Pages\EditTupoksi;
use App\Filament\Resources\Tupoksis\Pages\ListTupoksis;
use App\Filament\Resources\Tupoksis\Schemas\TupoksiForm;
use App\Filament\Resources\Tupoksis\Tables\TupoksisTable;
use App\Models\Tupoksi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TupoksiResource extends Resource
{
    protected static ?string $model = Tupoksi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Kegiatan';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Tupoksi';

    public static function form(Schema $schema): Schema
    {
        return TupoksiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TupoksisTable::configure($table);
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
            'index' => ListTupoksis::route('/'),
            'create' => CreateTupoksi::route('/create'),
            'edit' => EditTupoksi::route('/{record}/edit'),
        ];
    }
}
