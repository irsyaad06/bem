<?php

namespace App\Filament\Resources\ProgramKerjas\Tables;

use App\Filament\Resources\ProgramKerjas\Tables\Str;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;


class ProgramKerjasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster_utama')
                    ->label('Poster')
                    ->square()
                    ->defaultImageUrl(url('/images/default-event.png')), // Opsional

                TextColumn::make('judul')
                    ->label('Nama Kegiatan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),

                TextColumn::make('kementerian.nama')
                    ->label('Penyelenggara')
                    ->badge()
                    ->color('gray')
                    ->placeholder('BPH / Pusat')
                    ->sortable(),

                TextColumn::make('tanggal_mulai')
                    ->label('Tanggal')
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
            ->defaultSort('tanggal_mulai', 'desc') // Urutkan dari yang terbaru
            ->filters([
                // Filter status bisa ditambahkan nanti
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}