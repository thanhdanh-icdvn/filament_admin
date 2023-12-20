<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ProvinceDivisionTypeEnum: string implements HasLabel
{
    case Province = 'tỉnh';
    case CentralCity = 'thành phố trung ương';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
