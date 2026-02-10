<?php

namespace App\Filament\Resources\Tupoksis\Pages;

use App\Filament\Resources\Tupoksis\TupoksiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTupoksi extends EditRecord
{
    protected static string $resource = TupoksiResource::class;

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
