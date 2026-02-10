<?php

namespace App\Filament\Resources\Fakultas\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class FakultasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Info Fakultas')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama Fakultas')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) =>
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
