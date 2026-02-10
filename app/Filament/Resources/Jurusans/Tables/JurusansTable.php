<?php

namespace App\Filament\Resources\Jurusans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class JurusansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // GROUPING OTOMATIS BERDASARKAN FAKULTAS
            ->defaultGroup('fakultas.nama')
            ->groups([
                Group::make('fakultas.nama')
                    ->label('Fakultas')
                    ->collapsible(),
            ])
            ->columns([
                TextColumn::make('nama')
                    ->label('Program Studi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // Kolom Fakultas (Badge) - Muncul jika grouping dimatikan
                TextColumn::make('fakultas.nama')
                    ->label('Fakultas')
                    ->sortable()
                    ->badge()
                    ->color('gray'),

                // Hitung Mahasiswa per Jurusan
                TextColumn::make('profil_anggota_count')
                    ->counts('profilAnggota')
                    ->label('Jml. Mhs')
                    ->badge()
                    ->color('success')
                    ->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('fakultas_id')
                    ->relationship('fakultas', 'nama')
                    ->label('Filter Fakultas'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}