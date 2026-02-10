<?php

namespace App\Filament\Resources\Kementerians\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;

class KementerianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama')
                    ->schema([
                        // Logo diupload ke folder khusus kementerian
                        FileUpload::make('logo')
                            ->image()
                            ->maxSize(512)
                            ->directory('logo-kementerian') // Folder penyimpanan berbeda
                            ->alignCenter()
                            ->columnSpanFull()
                            ->imageEditor(),

                        // Relasi ke Kemenkoan (Dropdown)
                        // Menggunakan Select agar admin tinggal pilih nama Kemenkoan
                        Select::make('id_kemenkoan')
                            ->label('Naungan Kemenkoan')
                            ->relationship('kemenkoan', 'nama') // Menampilkan nama kemenkoan
                            ->searchable() // Bisa dicari ketik
                            ->preload() // Memuat data duluan biar cepat
                            ->placeholder('Pilih Kemenkoan (Kosongkan jika Biro Independen)')
                            ->columnSpanFull(),

                        TextInput::make('nama')
                            ->label('Nama Kementerian')
                            ->placeholder('Contoh: Kementerian Luar Negeri')
                            ->required(),

                        TextInput::make('alias')
                            ->label('Singkatan')
                            ->placeholder('Contoh: KEMLU')
                            ->formatStateUsing(fn(?string $state) => strtoupper($state)),
                    ])->columns(2),

                Section::make('Detail & Filosofi')
                    ->schema([
                        MarkdownEditor::make('deskripsi')
                            ->label('Deskripsi Lengkap')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
