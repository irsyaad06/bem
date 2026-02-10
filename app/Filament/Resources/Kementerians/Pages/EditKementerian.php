<?php

namespace App\Filament\Resources\Kementerians\Pages;

use App\Filament\Resources\Kementerians\KementerianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKementerian extends EditRecord
{
    protected static string $resource = KementerianResource::class;

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
