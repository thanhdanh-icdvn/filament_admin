<?php

namespace App\Filament\Resources\CollectionRuleResource\Pages;

use App\Filament\Resources\CollectionRuleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCollectionRules extends ListRecords
{
    protected static string $resource = CollectionRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
