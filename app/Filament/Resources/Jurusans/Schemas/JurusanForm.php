<?php

namespace App\Filament\Resources\Jurusans\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class JurusanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Info Program Studi')
                    ->schema([
                        Select::make('fakultas_id')
                            ->relationship('fakultas', 'nama')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('nama')
                            ->label('Nama Jurusan')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => 
                                $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }
}