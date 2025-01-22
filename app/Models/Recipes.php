<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name', 'description', 'instructions', 'category_id'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient')
                    ->using(RecipeIngredient::class)
                    ->withPivot('quantity', 'unit');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

