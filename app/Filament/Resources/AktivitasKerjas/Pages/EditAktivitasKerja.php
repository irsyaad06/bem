<?php

namespace App\Filament\Resources\AktivitasKerjas\Pages;

use App\Filament\Resources\AktivitasKerjas\AktivitasKerjaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAktivitasKerja extends EditRecord
{
    protected static string $resource = AktivitasKerjaResource::class;

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
