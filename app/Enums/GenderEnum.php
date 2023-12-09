<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum GenderEnum: string implements HasLabel
{
    case Male = 'male';
    case Female = 'female';
    case Other = 'other';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
