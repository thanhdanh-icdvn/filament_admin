<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CollectionTypeEnum: string implements HasLabel
{
    case Auto = 'auto';
    case Manual = 'manual';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
