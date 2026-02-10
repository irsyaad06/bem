<?php

namespace App\Filament\Resources\ProgramKerjas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProgramKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_kementerian')
                    ->numeric(),
                TextInput::make('judul')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('lokasi')
                    ->required(),
                TextInput::make('link_lokasi'),
                DatePicker::make('tanggal_mulai')
                    ->required(),
                DatePicker::make('tanggal_selesai'),
                Select::make('status')
                    ->options(['segera_hadir' => 'Segera hadir', 'berlangsung' => 'Berlangsung', 'terlaksana' => 'Terlaksana'])
                    ->default('segera_hadir')
                    ->required(),
                TextInput::make('poster_utama'),
                TextInput::make('proposal_kegiatan'),
                TextInput::make('laporan_pertanggungjawaban'),
            ]);
    }
}
