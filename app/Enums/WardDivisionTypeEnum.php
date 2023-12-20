<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum WardDivisionTypeEnum: string implements HasLabel
{
    case Xa = 'xã';
    case Phuong = 'phường';
    case ThiTran = 'thị trấn';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
