<?php

namespace App\Filament\Resources\Kemenkoans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KemenkoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('alias'),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('logo'),
            ]);
    }
}
