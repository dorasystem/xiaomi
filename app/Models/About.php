<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_uz',
        'content_ru',
        'content_en',
        'about_or_company_uz',
        'about_or_company_ru',
        'about_or_company_en',
        'description_uz',
        'description_ru',
        'description_en',
        'image',
        'photo',
    ];
}

