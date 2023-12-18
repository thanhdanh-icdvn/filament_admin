<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'division_type', 'codename', 'district_code'];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_code');
    }
}
