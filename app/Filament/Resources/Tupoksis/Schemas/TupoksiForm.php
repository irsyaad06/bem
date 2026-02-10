<?php

namespace App\Filament\Resources\Tupoksis\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater; // Panggil Repeater
use Filament\Forms\Components\TextInput;

class TupoksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Atur Tupoksi')
                    ->schema([
                        Select::make('id_kementerian')
                            ->label('Kementerian Target')
                            ->relationship('kementerian', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),

                        // INI BAGIAN REPEATER (POIN PER POIN)
                        Repeater::make('deskripsi')
                            ->label('Daftar Tugas Pokok & Fungsi')
                            ->schema([
                                TextInput::make('poin') // Key-nya jadi 'poin'
                                    ->label('Butir Tupoksi')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->addActionLabel('Tambah Poin Tupoksi') // Label Tombol Tambah
                            ->defaultItems(1) // Default muncul 1 form kosong
                            ->grid(1) // Tampil menumpuk ke bawah
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }
}