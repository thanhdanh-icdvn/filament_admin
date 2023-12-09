<?php

namespace App\Filament\Resources\AttributeOptionSkuResource\Pages;

use App\Filament\Resources\AttributeOptionSkuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttributeOptionSku extends EditRecord
{
    protected static string $resource = AttributeOptionSkuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
