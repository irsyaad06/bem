<?php

namespace App\Filament\Resources\Kemenkoans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;

class KemenkoansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan Logo
                ImageColumn::make('logo')
                    ->circular()
                    ->label('Logo'),

                TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('alias')
                    ->searchable()
                    ->badge() // Tampil sebagai badge warna
                    ->color('info')
                    ->placeholder('-'),

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
