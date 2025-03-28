<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticKeyword extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'en', 'ru', 'uz'];
}
