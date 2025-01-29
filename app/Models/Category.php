<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name_uz',
        'name_ru',
        'name_en',
        'slug',
        'description_uz',
        'description_ru',
        'description_en',
        'image'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = json_encode([
                'uz' => Str::slug($model->name_uz ?? ''),
                'ru' => Str::slug($model->name_ru ?? ''),
                'en' => Str::slug($model->name_en ?? ''),
            ]);
        });
        static::updating(function ($model) {
            $model->slug = json_encode([
                'uz' => Str::slug($model->name_uz ?? ''),
                'ru' => Str::slug($model->name_ru ?? ''),
                'en' => Str::slug($model->name_en ?? ''),
            ]);
        });
    }
    public function getSlugByLanguage($lang)
    {
        $slug = json_decode($this->attributes['slug'], true);
        return $slug[$lang] ?? null;
    }
}
