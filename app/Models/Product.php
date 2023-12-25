<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'thumbnail', 'images', 'description', 'SKU', 'category_id', 'inventory_id', 'price', 'discount_id'];

    protected $casts = [
        'images' => 'array',
    ];
}
