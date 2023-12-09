<?php

namespace App\Filament\Resources\AttributeOptionResource\Pages;

use App\Filament\Resources\AttributeOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttributeOption extends EditRecord
{
    protected static string $resource = AttributeOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
