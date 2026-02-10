<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // === KOLOM KIRI (DATA DIRI) ===
                Section::make('Informasi Akun')
                    ->description('Detail identitas pengguna.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Alamat Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Select::make('peran')
                            ->label('Hak Akses (Role)')
                            ->options([
                                'superadmin' => 'Super Admin',
                                'admin_kementerian' => 'Admin Kementerian',
                                'pimpinan' => 'Pimpinan',
                                'staff' => 'staff',
                            ])
                            ->default('anggota') // Default jika tidak dipilih
                            ->required()
                            ->native(false),

                        DateTimePicker::make('email_verified_at')
                            ->label('Tanggal Verifikasi')
                            ->readOnly()
                            ->disabled()
                            ->placeholder('Belum diverifikasi'),
                    ])->columns(2),

                // === KOLOM KANAN (KEAMANAN) ===
                Section::make('Keamanan')
                    ->description('Atur kata sandi pengguna.')
                    ->schema([
                        TextInput::make('password')
                            ->label('Kata Sandi')
                            ->password()
                            ->revealable() // Bisa intip password
                            ->dehydrateStateUsing(fn($state) => Hash::make($state)) // Enkripsi otomatis
                            ->dehydrated(fn($state) => filled($state)) // Hanya simpan jika diisi
                            ->required(fn(string $operation): bool => $operation === 'create'), // Wajib cuma pas Create
                    ])->columns(2),
            ]);
    }
}
