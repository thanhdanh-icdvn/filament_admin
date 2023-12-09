<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubRegion extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'region_id', 'wikiDataId'];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
