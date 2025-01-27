<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'message', 'rating','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

