<?php

namespace App\Filament\Resources\ProvinceResource\Pages;

use App\Enums\ProvinceDivisionTypeEnum;
use App\Filament\Resources\ProvinceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListProvinces extends ListRecords
{
    protected static string $resource = ProvinceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Tất cả'),
            ProvinceDivisionTypeEnum::Province->name => Tab::make(ProvinceDivisionTypeEnum::Province->value)
                ->modifyQueryUsing(function ($query) {
                    return $query->where('division_type', ProvinceDivisionTypeEnum::Province->value);
                }),
            ProvinceDivisionTypeEnum::CentralCity->name => Tab::make(ProvinceDivisionTypeEnum::CentralCity->value)
                ->modifyQueryUsing(function ($query) {
                    return $query->where('division_type', ProvinceDivisionTypeEnum::CentralCity->value);
                }),
        ];
    }
}
