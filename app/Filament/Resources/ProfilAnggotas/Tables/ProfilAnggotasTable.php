<?php

namespace App\Filament\Resources\ProfilAnggotas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfilAnggotasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_user')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_kemenkoan')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_kementerian')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nama_lengkap')
                    ->searchable(),
                TextColumn::make('nama_panggilan')
                    ->searchable(),
                TextColumn::make('nim')
                    ->searchable(),
                TextColumn::make('fakultas')
                    ->searchable(),
                TextColumn::make('prodi')
                    ->searchable(),
                TextColumn::make('angkatan')
                    ->searchable(),
                TextColumn::make('nama_jabatan')
                    ->searchable(),
                TextColumn::make('level_jabatan')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('aktif')
                    ->boolean(),
                TextColumn::make('nomor_telepon')
                    ->searchable(),
                TextColumn::make('foto_profil')
                    ->searchable(),
                TextColumn::make('kata_kata')
                    ->searchable(),
                TextColumn::make('username_instagram')
                    ->searchable(),
                TextColumn::make('username_tiktok')
                    ->searchable(),
                TextColumn::make('username_linkedin')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
