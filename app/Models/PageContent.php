<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{

    use HasFactory;
    protected $fillable = [
        'title_uz', 'title_ru', 'title_en',
        'content_uz', 'content_ru', 'content_en',
        'image_uz', 'image_ru', 'image_en'
    ];
}
