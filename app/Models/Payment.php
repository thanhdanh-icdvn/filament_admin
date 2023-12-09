<?php

namespace App\Models;

use App\Enums\PaymentTemplateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'accountNo',
        'accountName',
        'bank_id',
        'amount',
        'addInfo',
        'format',
        'template',
        'qr',
    ];

    protected $casts = [
        'template' => PaymentTemplateEnum::class,
    ];

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
