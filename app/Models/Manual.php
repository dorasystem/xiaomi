<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'pdf_uz', 'pdf_ru', 'pdf_en'];
}
