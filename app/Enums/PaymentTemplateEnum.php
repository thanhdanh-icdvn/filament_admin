<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentTemplateEnum: string implements HasLabel
{
    case Compact = 'compact';
    case Compact_2 = 'compact2';
    case QR_Only = 'qr_only';
    case Print = 'print';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
