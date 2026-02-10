<?php

namespace App\Filament\Resources\AktivitasKerjas\Pages;

use App\Filament\Resources\AktivitasKerjas\AktivitasKerjaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAktivitasKerja extends CreateRecord
{
    protected static string $resource = AktivitasKerjaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
