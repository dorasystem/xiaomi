<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image', 'description_uz', 'description_ru', 'description_en']; // Add description fields

    protected $casts = [
        'images' => 'array',
        'description_uz' => 'array',
        'description_ru' => 'array',
        'description_en' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
