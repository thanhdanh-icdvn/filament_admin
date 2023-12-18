<?php

use Filament\Support\Contracts\HasLabel;

enum ProvinceDivisionTypeEnum: string implements HasLabel
{
    case Tỉnh = 'tỉnh';
    case Thành_phố_TW = 'thành phố trung ương';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
