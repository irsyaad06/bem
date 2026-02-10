<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Support\Icons\Heroicon;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan Avatar dari Inisial Nama (Fitur bawaan Filament/UI Avatars)
                TextColumn::make('name')
                    ->label('Pengguna')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn($record) => $record->email), // Email tampil kecil di bawah nama

                // Indikator Verifikasi Email (Icon Ceklis/Silang)
                IconColumn::make('email_verified_at')
                    ->label('Verifikasi')
                    ->boolean()
                    ->trueIcon(Heroicon::OutlinedCheckBadge)
                    ->falseIcon(Heroicon::OutlinedXMark)
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('Bergabung')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Update Terakhir')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Bisa tambah filter verified/unverified disini
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(), // Tambahkan Delete agar bisa hapus user
            ]);
    }
}
