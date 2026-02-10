<?php

namespace App\Filament\Resources\Kemenkoans\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;

class KemenkoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama')
                    ->schema([
                        // Logo diupload ke folder khusus
                        FileUpload::make('logo')
                            ->image()
                            ->maxSize(512)
                            ->directory('logo-kemenko')
                            ->alignCenter()
                            ->columnSpanFull()
                            ->imageEditor(),

                        TextInput::make('nama')
                            ->label('Nama Kemenkoan')
                            ->placeholder('Contoh: Kemenko Pergerakan Mahasiswa')
                            ->required(),

                        TextInput::make('alias')
                            ->label('Singkatan')
                            ->placeholder('Contoh: KEMENKO PERMA')
                            ->formatStateUsing(fn(?string $state) => strtoupper($state)),
                    ])->columns(2),

                Section::make('Detail & Filosofi')
                    ->schema([
                        // Menggunakan MarkdownEditor sesuai request
                        MarkdownEditor::make('deskripsi')
                            ->label('Deskripsi Lengkap')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
