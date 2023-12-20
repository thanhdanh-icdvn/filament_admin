<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum DistrictDivisionTypeEnum: string implements HasLabel
{
    case Huyen = 'huyện';
    case Quan = 'quận';
    case ThanhPho = 'thành phố';
    case ThiXa = 'thị xã';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
