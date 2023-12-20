<?php

namespace App\Models;

use App\Enums\ProvinceDivisionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'division_type', 'codename', 'phone_code'];

    protected $casts = [
        'division_type' => ProvinceDivisionTypeEnum::class,
    ];

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
