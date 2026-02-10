<?php

namespace App\Filament\Resources\Tupoksis\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;

class TupoksisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kementerian.nama')
                    ->label('Kementerian')
                    ->sortable()
                    ->searchable()
                    ->weight('bold')
                    ->badge()
                    ->color('info'),

                // Tampilkan isi list array tupoksi
                TextColumn::make('deskripsi')
                    ->label('Tupoksi')
                    ->listWithLineBreaks()
                    ->bulleted()
                    ->limitList(3)
                    ->expandableLimitedList()
                    // --- TAMBAHKAN INI ---
                    ->getStateUsing(function ($record) {
                        // Kita ambil array deskripsi, lalu cuma ambil value 'poin'-nya aja
                        return collect($record->deskripsi ?? [])
                            ->pluck('poin')
                            ->toArray();
                    }),

                TextColumn::make('updated_at')
                    ->label('Terakhir Update')
                    ->since()
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
