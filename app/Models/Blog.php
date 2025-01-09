<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_uz',
        'title_ru',
        'title_en',
        'slug',
        'description_uz',
        'description_ru',
        'description_en',
        'content_uz',
        'content_ru',
        'content_en',
        'date',
        'status',
        'image',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = json_encode([
                'uz' => Str::slug($model->title_uz ?? ''),
                'ru' => Str::slug($model->title_ru ?? ''),
                'en' => Str::slug($model->title_en ?? ''),
            ]);
        });
        static::updating(function ($model) {
            $model->slug = json_encode([
                'uz' => Str::slug($model->title_uz ?? ''),
                'ru' => Str::slug($model->title_ru ?? ''),
                'en' => Str::slug($model->title_en ?? ''),
            ]);
        });
    }
    public function getSlugByLanguage($lang)
    {
        $slug = json_decode($this->attributes['slug'], true);
        return $slug[$lang] ?? null;
    }
}
