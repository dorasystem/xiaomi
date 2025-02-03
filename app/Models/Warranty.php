<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model {
    use HasFactory;
    protected $fillable = ['slug', 'title_uz', 'title_en', 'title_ru', 'content_uz', 'content_en', 'content_ru'];
}
