<?php

namespace App\Filament\Resources\KomikResource\Pages;

use App\Filament\Resources\KomikResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKomik extends CreateRecord
{
    protected static string $resource = KomikResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
