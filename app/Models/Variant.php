<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'storage',
        'ram',
        'price',
        'color_uz',
        'color_ru',
        'color_en',
        'image',
        'images',
        'status'
    ];

    protected $casts = [
        'images' => 'array',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
