<?php

namespace App\Filament\Resources\KomikResource\Pages;

use App\Filament\Resources\KomikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKomiks extends ListRecords
{
    protected static string $resource = KomikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
