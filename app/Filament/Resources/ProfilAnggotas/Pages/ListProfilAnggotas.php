<?php

namespace App\Filament\Resources\ProfilAnggotas\Pages;

use App\Filament\Resources\ProfilAnggotas\ProfilAnggotaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilAnggotas extends ListRecords
{
    protected static string $resource = ProfilAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
