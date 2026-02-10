<?php

namespace App\Filament\Resources\Tupoksis\Pages;

use App\Filament\Resources\Tupoksis\TupoksiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTupoksis extends ListRecords
{
    protected static string $resource = TupoksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
