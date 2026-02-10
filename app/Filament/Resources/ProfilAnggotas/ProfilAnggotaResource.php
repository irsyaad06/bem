<?php

namespace App\Filament\Resources\ProfilAnggotas;

use App\Filament\Resources\ProfilAnggotas\Pages\CreateProfilAnggota;
use App\Filament\Resources\ProfilAnggotas\Pages\EditProfilAnggota;
use App\Filament\Resources\ProfilAnggotas\Pages\ListProfilAnggotas;
use App\Filament\Resources\ProfilAnggotas\Schemas\ProfilAnggotaForm;
use App\Filament\Resources\ProfilAnggotas\Tables\ProfilAnggotasTable;
use App\Models\ProfilAnggota;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProfilAnggotaResource extends Resource
{
    protected static ?string $model = ProfilAnggota::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static string | UnitEnum | null $navigationGroup = 'Pengguna & Staff';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Profil Anggota';

    public static function form(Schema $schema): Schema
    {
        return ProfilAnggotaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilAnggotasTable::configure($table);
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
            'index' => ListProfilAnggotas::route('/'),
            'create' => CreateProfilAnggota::route('/create'),
            'edit' => EditProfilAnggota::route('/{record}/edit'),
        ];
    }
}
