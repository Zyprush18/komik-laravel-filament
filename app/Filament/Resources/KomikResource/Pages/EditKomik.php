<?php

namespace App\Filament\Resources\KomikResource\Pages;

use App\Filament\Resources\KomikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKomik extends EditRecord
{
    protected static string $resource = KomikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
