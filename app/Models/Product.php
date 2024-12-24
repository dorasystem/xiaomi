<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'slug',
        'name_uz',
        'name_ru',
        'name_en',
        'description_uz',
        'description_ru',
        'description_en',
        'content_uz',
        'content_ru',
        'content_en',
        'gift_name',
        'gift_image',
        'image',
        'images',
        'color_uz',
        'color_ru',
        'color_en'
    ];

    protected $casts = [
        'images' => 'array',
        'price' => 'array',
        'storage' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
    public function descImages()
    {
        return $this->hasMany(DescImage::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
