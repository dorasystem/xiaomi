<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'gift_name_uz',
        'gift_name_ru',
        'gift_name_en',
        'gift_image',
        'image',
        'images',
        'color_uz',
        'color_ru',
        'color_en',
        'popular',
        'discount_status',
         'recommend_status',
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


    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $model->slug = json_encode([
    //             'uz' => Str::slug($model->name_uz ?? ''),
    //             'ru' => Str::slug($model->name_ru ?? ''),
    //             'en' => Str::slug($model->name_en ?? ''),
    //         ]);
    //     });
    //     static::updating(function ($model) {
    //         $model->slug = json_encode([
    //             'uz' => Str::slug($model->name_uz ?? ''),
    //             'ru' => Str::slug($model->name_ru ?? ''),
    //             'en' => Str::slug($model->name_en ?? ''),
    //         ]);
    //     });
    // }

}
