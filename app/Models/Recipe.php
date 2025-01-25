<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

