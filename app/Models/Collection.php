<?php

namespace App\Models;

use App\Enums\CollectionTypeEnum;
use App\Enums\MatchConditionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $casts = [
        'type' => CollectionTypeEnum::class,
        'match_conditions' => MatchConditionEnum::class,
    ];
}
