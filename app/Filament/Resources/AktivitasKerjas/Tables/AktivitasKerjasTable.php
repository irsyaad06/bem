<?php

namespace App\Filament\Resources\AktivitasKerjas\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

use Illuminate\Support\Str;

class AktivitasKerjasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto_dokumentasi')
                    ->label('Foto')
                    ->square()
                    ->defaultImageUrl(url('/images/default-activity.png')),

                TextColumn::make('nama_aktivitas')
                    ->label('Nama Aktivitas')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap()
                    ->description(fn ($record) => Str::limit($record->lokasi, 30)),

                TextColumn::make('kementerian.nama')
                    ->label('Pelaksana')
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('tanggal')
                    ->date('d M Y') // Format: 10 Feb 2026
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'info' => 'segera_hadir',
                        'warning' => 'berlangsung',
                        'success' => 'terlaksana',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'segera_hadir' => 'Segera Hadir',
                        'berlangsung' => 'Berlangsung',
                        'terlaksana' => 'Selesai',
                        default => $state,
                    }),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('tanggal', 'desc') // Urutkan dari yang terbaru
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}