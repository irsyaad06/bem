<?php

namespace App\Filament\Resources\ProfilAnggotas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProfilAnggotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                TextInput::make('id_kemenkoan')
                    ->numeric(),
                TextInput::make('id_kementerian')
                    ->numeric(),
                TextInput::make('nama_lengkap')
                    ->required(),
                TextInput::make('nama_panggilan'),
                TextInput::make('nim'),
                TextInput::make('fakultas'),
                TextInput::make('prodi'),
                TextInput::make('angkatan'),
                TextInput::make('nama_jabatan')
                    ->required(),
                TextInput::make('level_jabatan')
                    ->required()
                    ->numeric()
                    ->default(4),
                Toggle::make('aktif')
                    ->required(),
                TextInput::make('nomor_telepon')
                    ->tel(),
                TextInput::make('foto_profil'),
                TextInput::make('kata_kata'),
                TextInput::make('username_instagram'),
                TextInput::make('username_tiktok'),
                TextInput::make('username_linkedin'),
                Textarea::make('bio_singkat')
                    ->columnSpanFull(),
            ]);
    }
}
