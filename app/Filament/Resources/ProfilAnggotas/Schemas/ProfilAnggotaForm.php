<?php

namespace App\Filament\Resources\ProfilAnggotas\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class ProfilAnggotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // === KOLOM KIRI (DATA UTAMA - 2 Bagian) ===
                Group::make()
                    ->schema([
                        // Bagian 1: Data Diri & Akademik
                        Section::make('Data Pribadi & Akademik')
                            ->columns(2)
                            ->schema([
                                Select::make('id_user')
                                    ->label('Akun User Terkait')
                                    ->relationship('user', 'name') // Asumsi relasi di model ProfilAnggota: function user()
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->columnSpanFull(), // Lebar penuh

                                TextInput::make('nama_lengkap')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('nama_panggilan')
                                    ->maxLength(50),

                                TextInput::make('nim')
                                    ->label('NIM')
                                    ->numeric()
                                    ->required(),

                                TextInput::make('angkatan')
                                    ->numeric()
                                    ->maxLength(4),

                                TextInput::make('fakultas')
                                    ->required(),

                                TextInput::make('prodi')
                                    ->label('Program Studi')
                                    ->required(),

                                TextInput::make('nomor_telepon')
                                    ->tel()
                                    ->prefix('+62'),
                            ])->columns(2),

                        // Bagian 2: Organisasi & Jabatan
                        Section::make('Posisi di Organisasi')

                            ->schema([
                                Select::make('id_kemenkoan')
                                    ->label('Kemenkoan (Naungan)')
                                    ->relationship('kemenkoan', 'nama') // Asumsi relasi function kemenkoan()
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('Pilih jika ada'),

                                Select::make('id_kementerian')
                                    ->label('Kementerian / Dinas')
                                    ->relationship('kementerian', 'nama') // Asumsi relasi function kementerian()
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('Pilih jika ada'),

                                TextInput::make('nama_jabatan')
                                    ->label('Nama Jabatan Lengkap')
                                    ->placeholder('Contoh: Kepala Dinas Advokasi')
                                    ->required()
                                    ->columnSpanFull(),

                                Select::make('level_jabatan')
                                    ->label('Tingkatan Jabatan')
                                    ->options([
                                        1 => 'Level 1 - BPH Inti (Presma/Wapres/Sesneg/Menkeu)',
                                        2 => 'Level 2 - Menko / Wamenko',
                                        3 => 'Level 3 - Menteri / Wamen',
                                        4 => 'Level 4 - Staff Ahli / Sekretaris Kementerian',
                                        5 => 'Level 5 - Staff Biasa',
                                    ])
                                    ->default(4)
                                    ->required(),
                            ])->columns(2),
                    ]),

                // === KOLOM KANAN (SIDEBAR - 1 Bagian) ===
                Group::make()
                    ->schema([
                        Section::make('Foto & Status')
                            ->schema([
                                FileUpload::make('foto_profil')
                                    ->label('Foto Resmi')
                                    ->image()
                                    ->imageEditor()
                                    ->imageAspectRatio('4:5')
                                    ->automaticallyCropImagesToAspectRatio()
                                    ->directory('foto-anggota')
                                    ->columnSpanFull(),

                                Toggle::make('aktif')
                                    ->label('Status Aktif')
                                    ->onColor('success')
                                    ->offColor('danger')
                                    ->inline(false)
                                    ->default(false)
                                    ->helperText('Matikan jika anggota sudah tidak aktif/resigned.'),
                            ]),

                        Section::make('Media Sosial & Bio')
                            ->collapsed()
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextInput::make('username_instagram')->prefix('@'),
                                        TextInput::make('username_tiktok')->prefix('@'),
                                        TextInput::make('username_linkedin')->prefix('in/'),
                                    ]),
                                Textarea::make('bio_singkat')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                TextInput::make('kata_kata')
                                    ->label('Quotes / Motto')
                                    ->columnSpanFull(),
                            ]),
                    ]),


            ]);
    }
}
