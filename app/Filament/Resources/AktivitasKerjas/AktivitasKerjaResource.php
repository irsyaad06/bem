<?php

namespace App\Filament\Resources\AktivitasKerjas;

use App\Filament\Resources\AktivitasKerjas\Pages\CreateAktivitasKerja;
use App\Filament\Resources\AktivitasKerjas\Pages\EditAktivitasKerja;
use App\Filament\Resources\AktivitasKerjas\Pages\ListAktivitasKerjas;
use App\Filament\Resources\AktivitasKerjas\Schemas\AktivitasKerjaForm;
use App\Filament\Resources\AktivitasKerjas\Tables\AktivitasKerjasTable;
use App\Models\AktivitasKerja;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AktivitasKerjaResource extends Resource
{
    protected static ?string $model = AktivitasKerja::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCubeTransparent;

    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Kegiatan';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Aktivitas Kerja';

    public static function form(Schema $schema): Schema
    {
        return AktivitasKerjaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AktivitasKerjasTable::configure($table);
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
            'index' => ListAktivitasKerjas::route('/'),
            'create' => CreateAktivitasKerja::route('/create'),
            'edit' => EditAktivitasKerja::route('/{record}/edit'),
        ];
    }
}
