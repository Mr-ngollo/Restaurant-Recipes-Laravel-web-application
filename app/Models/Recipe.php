<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'ingredients',
        'preparation_steps',
        'cooking_time',
        'dietary_information',
        'cuisine_type'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%")
        ->orWhere('description','like',"%{$value}%");
    }
}

