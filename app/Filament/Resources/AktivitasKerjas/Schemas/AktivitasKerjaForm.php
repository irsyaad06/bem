<?php

namespace App\Filament\Resources\AktivitasKerjas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AktivitasKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_kementerian')
                    ->required()
                    ->numeric(),
                TextInput::make('nama_aktivitas')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('lokasi')
                    ->required(),
                TextInput::make('link_lokasi'),
                DatePicker::make('tanggal')
                    ->required(),
                Select::make('status')
                    ->options(['segera_hadir' => 'Segera hadir', 'berlangsung' => 'Berlangsung', 'terlaksana' => 'Terlaksana'])
                    ->default('segera_hadir')
                    ->required(),
                TextInput::make('foto_dokumentasi'),
            ]);
    }
}
