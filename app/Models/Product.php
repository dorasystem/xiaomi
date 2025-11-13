<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    /**
     * @OA\Schema(
     *     schema="Product",
     *     type="object",
     *     required={"category_id","slug","name_uz","description_uz"},
     *     @OA\Property(property="code", type="string", example="00-000001"),
     *     @OA\Property(property="id", type="integer", readOnly=true),
     *     @OA\Property(property="category_id", type="integer"),
     *     @OA\Property(property="slug", type="string"),
     *     @OA\Property(property="name_uz", type="string"),
     *     @OA\Property(property="name_ru", type="string", nullable=true),
     *     @OA\Property(property="name_en", type="string", nullable=true),
     *     @OA\Property(property="description_uz", type="string"),
     *     @OA\Property(property="description_ru", type="string", nullable=true),
     *     @OA\Property(property="description_en", type="string", nullable=true),
     *     @OA\Property(property="content_uz", type="string", nullable=true),
     *     @OA\Property(property="content_ru", type="string", nullable=true),
     *     @OA\Property(property="content_en", type="string", nullable=true),
     *     @OA\Property(property="gift_name_uz", type="string", nullable=true),
     *     @OA\Property(property="gift_name_ru", type="string", nullable=true),
     *     @OA\Property(property="gift_name_en", type="string", nullable=true),
     *     @OA\Property(property="gift_image", type="string", nullable=true),
     *     @OA\Property(property="image", type="string", nullable=true),
     *     @OA\Property(property="images", type="string", nullable=true),
     *     @OA\Property(property="color_uz", type="string", nullable=true),
     *     @OA\Property(property="color_ru", type="string", nullable=true),
     *     @OA\Property(property="color_en", type="string", nullable=true),
     *     @OA\Property(property="popular", type="boolean", nullable=true),
     *     @OA\Property(property="discount_status", type="boolean", nullable=true),
     *     @OA\Property(property="recommend_status", type="boolean", nullable=true),
     *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
     *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
     * )
     */


    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
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
