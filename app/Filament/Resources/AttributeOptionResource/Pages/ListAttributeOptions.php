<?php

namespace App\Filament\Resources\AttributeOptionResource\Pages;

use App\Filament\Resources\AttributeOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttributeOptions extends ListRecords
{
    protected static string $resource = AttributeOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
