<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainBanner extends Model
{
    use HasFactory;

    protected $fillable = ['images', 'image1', 'image2', 'product_ids'];
    protected $casts = [
        'images' => 'array',
        'product_ids' => 'array',
    ];

}

