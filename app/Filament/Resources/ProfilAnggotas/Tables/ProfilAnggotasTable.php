<?php

namespace App\Filament\Resources\ProfilAnggotas\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification; // Opsional: Untuk notifikasi

class ProfilAnggotasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom 1: Foto
                ImageColumn::make('foto_profil')
                    ->label('')
                    ->circular()
                    ->defaultImageUrl(url('/images/default-avatar.png')),

                // Kolom 2: Identitas (Nama & NIM Digabung)
                TextColumn::make('nama_lengkap')
                    ->label('Anggota')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn($record) => $record->nim . ' - ' . $record->prodi),

                // Kolom 3: Jabatan & Unit
                TextColumn::make('nama_jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->wrap() // Biar turun ke bawah kalau panjang
                    ->description(fn($record) => $record->kementerian?->nama ?? $record->kemenkoan?->nama ?? 'BPH Pusat'),

                // Kolom 4: Level (Badge Warna)
                TextColumn::make('level_jabatan')
                    ->label('Level')
                    ->badge()
                    ->colors([
                        'danger' => 1,  // Merah (Petinggi)
                        'warning' => 2, // Kuning (Menko)
                        'success' => 3, // Hijau (Menteri)
                        'info' => 4,    // Biru (Staff)
                        'gray' => 5,    // Abu (Magang)
                    ])
                    ->formatStateUsing(fn($state) => 'Lvl ' . $state)
                    ->sortable(),

                // Kolom 5: Status Aktif
                ToggleColumn::make('aktif')
                    ->label('Status Aktif')
                    ->onColor('success')
                    ->offColor('danger')
                    // LOGIKA OTOMATIS VERIFIKASI USER ADA DI SINI:
                    ->afterStateUpdated(function ($record, $state) {
                        // $record adalah data ProfilAnggota saat ini
                        // $state adalah nilai baru (true/false)

                        // Cek apakah profil ini punya user yang terkait
                        if ($record->user) {
                            if ($state) {
                                // Kalo AKTIF (True) -> Isi tanggal verifikasi sekarang
                                $record->user->update([
                                    'email_verified_at' => now(),
                                ]);

                                // Opsional: Kirim notifikasi sukses ke Admin
                                Notification::make()
                                    ->title('User Terverifikasi')
                                    ->body("User {$record->user->name} otomatis diverifikasi.")
                                    ->success()
                                    ->send();
                            } else {
                                // Kalo NON-AKTIF (False) -> Kosongkan verifikasi (Cabut akses)
                                $record->user->update([
                                    'email_verified_at' => null,
                                ]);

                                Notification::make()
                                    ->title('Akses User Dicabut')
                                    ->body("Verifikasi user {$record->user->name} dibatalkan.")
                                    ->warning()
                                    ->send();
                            }
                        }
                    }),

                TextColumn::make('updated_at')
                    ->label('Update')
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter Status Aktif
                \Filament\Tables\Filters\TernaryFilter::make('aktif')
                    ->label('Status Keaktifan')
                    ->placeholder('Semua Anggota')
                    ->trueLabel('Anggota Aktif')
                    ->falseLabel('Tidak Aktif'),

                // Filter Kementerian
                SelectFilter::make('id_kementerian')
                    ->label('Kementerian')
                    ->relationship('kementerian', 'nama')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
