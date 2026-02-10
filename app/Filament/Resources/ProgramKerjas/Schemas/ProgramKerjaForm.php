<?php

namespace App\Filament\Resources\ProgramKerjas\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class ProgramKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // === SECTION 1: INFORMASI DASAR ===
                Section::make('Informasi Kegiatan')
                    ->description('Masukan detail utama program kerja.')
                    ->schema([
                        TextInput::make('judul')
                            ->label('Nama Kegiatan')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn(string $operation, $state, $component) =>
                                $operation === 'create' ? $component->getContainer()->getComponent('slug_input')->state(Str::slug($state)) : null
                            ),

                        TextInput::make('slug')
                            ->key('slug_input')
                            ->label('Link (terisi otomatis)')
                            ->required()
                            ->readOnly()
                            ->unique(ignoreRecord: true),

                        Select::make('id_kementerian')
                            ->label('Penyelenggara')
                            ->relationship('kementerian', 'nama')
                            ->searchable()
                            ->preload()
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
                            ->label('Deskripsi Lengkap')
                            ->columnSpanFull(), // Agar lebar penuh ke samping
                    ])
                    ->columnSpanFull(), // Bagi 2 kolom (Kiri-Kanan)

                // === SECTION 2: WAKTU & LOKASI ===
                Section::make('Waktu & Tempat')
                    ->schema([
                        TextInput::make('lokasi')
                            ->label('Nama Tempat')
                            ->required(),

                        TextInput::make('link_lokasi')
                            ->label('Link Google Maps')
                            ->url()
                            ->prefixIcon(Heroicon::OutlinedMapPin)
                            ->placeholder('https://goo.gl/maps/...'),

                        DatePicker::make('tanggal_mulai')
                            ->label('Tanggal Mulai')
                            ->required(),

                        DatePicker::make('tanggal_selesai')
                            ->label('Tanggal Selesai')
                            ->afterOrEqual('tanggal_mulai'),
                    ])
                    ->columns(2), // Bagi 2 kolom

                // === SECTION 3: MEDIA & DOKUMEN ===
                Section::make('Media & Dokumen')
                    ->schema([
                        FileUpload::make('poster_utama')
                            ->label('Poster Kegiatan')
                            ->image()
                            ->directory('poster-proker')
                            ->imageEditor()
                            ->columnSpanFull(), // Poster lebar penuh biar jelas

                        FileUpload::make('proposal_kegiatan')
                            ->label('Upload Proposal (PDF)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('dokumen-proker')
                            ->downloadable(),

                        FileUpload::make('laporan_pertanggungjawaban')
                            ->label('Upload LPJ (PDF)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('dokumen-proker')
                            ->downloadable(),
                    ])
                    ->columns(2),
            ]);
    }
}
