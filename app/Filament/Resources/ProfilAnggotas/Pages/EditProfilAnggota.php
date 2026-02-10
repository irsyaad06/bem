<?php

namespace App\Filament\Resources\ProfilAnggotas\Pages;

use App\Filament\Resources\ProfilAnggotas\ProfilAnggotaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilAnggota extends EditRecord
{
    protected static string $resource = ProfilAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
