<?php

namespace App\Filament\Resources\CollectionRuleResource\Pages;

use App\Filament\Resources\CollectionRuleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCollectionRule extends EditRecord
{
    protected static string $resource = CollectionRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
