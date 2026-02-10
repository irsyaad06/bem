<?php

namespace App\Filament\Resources\Kementerians\Pages;

use App\Filament\Resources\Kementerians\KementerianResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKementerian extends CreateRecord
{
    protected static string $resource = KementerianResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
