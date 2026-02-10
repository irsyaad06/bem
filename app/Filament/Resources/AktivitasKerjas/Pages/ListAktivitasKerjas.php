<?php

namespace App\Filament\Resources\AktivitasKerjas\Pages;

use App\Filament\Resources\AktivitasKerjas\AktivitasKerjaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAktivitasKerjas extends ListRecords
{
    protected static string $resource = AktivitasKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
