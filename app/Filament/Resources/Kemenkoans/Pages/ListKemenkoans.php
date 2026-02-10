<?php

namespace App\Filament\Resources\Kemenkoans\Pages;

use App\Filament\Resources\Kemenkoans\KemenkoanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKemenkoans extends ListRecords
{
    protected static string $resource = KemenkoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
