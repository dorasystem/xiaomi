<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_uz', 'address_ru', 'address_en',
        'title_uz', 'title_ru', 'title_en',
        'phone_1', 'phone_2', 'email',
        'latitude', 'longitude'
    ];

    protected $table = 'stores';

}
