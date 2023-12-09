<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MatchConditionEnum: string implements HasLabel
{
    case All = 'all';
    case Any = 'any';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
