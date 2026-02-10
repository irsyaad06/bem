<?php

namespace App\Filament\Resources\Kemenkoans\Pages;

use App\Filament\Resources\Kemenkoans\KemenkoanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKemenkoan extends CreateRecord
{
    protected static string $resource = KemenkoanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
