<?php

namespace App\Filament\Resources\Kemenkoans\Pages;

use App\Filament\Resources\Kemenkoans\KemenkoanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKemenkoan extends EditRecord
{
    protected static string $resource = KemenkoanResource::class;

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
