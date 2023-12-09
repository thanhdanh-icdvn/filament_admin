<?php

namespace App\Filament\Resources\SkuResource\Pages;

use App\Filament\Resources\SkuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSku extends EditRecord
{
    protected static string $resource = SkuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
