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
        'image'
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

