<?php

namespace App\Filament\Resources\Kementerians\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;

class KementeriansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultGroup('kemenkoan.alias')

            ->columns([
                // Menampilkan Logo
                ImageColumn::make('logo')
                    ->circular()
                    ->label('Logo'),

                // Nama Kementerian
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // Tambahan: Menampilkan Induk Kemenkoan
                // Menggunakan dot notation "relation.column"


                TextColumn::make('alias')
                    ->searchable()
                    ->badge() // Tampil sebagai badge warna
                    ->color('info')
                    ->placeholder('-'),
                TextColumn::make('kemenkoan.alias')
                    ->label('Naungan')
                    ->badge()
                    ->color('warning') // Warna oranye agar beda dengan alias
                    ->placeholder('Biro Independen') // Teks jika tidak punya kemenko (null)
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->filters([
                // Filter bisa ditambahkan di sini nanti
            ])

        ;
    }
}
