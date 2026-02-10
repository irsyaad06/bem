<?php

namespace App\Filament\Resources\Kementerians\Pages;

use App\Filament\Resources\Kementerians\KementerianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKementerians extends ListRecords
{
    protected static string $resource = KementerianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
