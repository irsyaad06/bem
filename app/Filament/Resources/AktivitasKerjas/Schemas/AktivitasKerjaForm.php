<?php

namespace App\Filament\Resources\AktivitasKerjas\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class AktivitasKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                // === SECTION 1: INFORMASI AKTIVITAS ===
                Section::make('Informasi Aktivitas')
                    ->description('Masukan detail aktivitas harian atau insidental.')
                    ->schema([
                        TextInput::make('nama_aktivitas')
                            ->label('Nama Aktivitas')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, $component) => 
                                $operation === 'create' ? $component->getContainer()->getComponent('slug_input')->state(Str::slug($state)) : null
                            ),

                        TextInput::make('slug')
                            ->key('slug_input')
                            ->label('Link (terisi otomatis)')
                            ->required()
                            ->readOnly()
                            ->unique(ignoreRecord: true),

                        Select::make('id_kementerian')
                            ->label('Pelaksana (PIC)')
                            ->relationship('kementerian', 'nama')
                            ->searchable()
                            ->preload()
                            ->required() // Aktivitas biasanya wajib punya kementerian
                            ->placeholder('Pilih Kementerian'),

                        Select::make('status')
                            ->options([
                                'segera_hadir' => 'Segera Hadir',
                                'berlangsung' => 'Berlangsung',
                                'terlaksana' => 'Terlaksana',
                            ])
                            ->default('segera_hadir')
                            ->required()
                            ->native(false),

                        MarkdownEditor::make('deskripsi')
                            ->label('Deskripsi Singkat')
                            ->columnSpanFull(),
                    ])
                    ->columns(2), // Bagi 2 kolom (Kiri-Kanan)

                // === SECTION 2: WAKTU & LOKASI ===
                Section::make('Waktu & Tempat')
                    ->schema([
                        TextInput::make('lokasi')
                            ->label('Lokasi')
                            ->prefixIcon(Heroicon::OutlinedMapPin)
                            ->required(),

                        TextInput::make('link_lokasi')
                            ->label('Link Google Maps')
                            ->url()
                            ->placeholder('https://goo.gl/maps/...'),

                        DatePicker::make('tanggal')
                            ->label('Tanggal Pelaksanaan')
                            ->required()
                            ->columnSpanFull(), // Tanggal sendiri biar lebar
                    ])
                    ->columns(2),

                // === SECTION 3: DOKUMENTASI ===
                Section::make('Bukti Fisik')
                    ->schema([
                        FileUpload::make('foto_dokumentasi')
                            ->label('Foto Dokumentasi')
                            ->image()
                            ->directory('dokumentasi-aktivitas') // Folder penyimpanan
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}