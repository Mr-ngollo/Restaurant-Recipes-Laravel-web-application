<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeIngredient extends Pivot
{
    // Define the table name if it differs from the default
    protected $table = 'recipe_ingredient';

    // Specify any additional columns you want to make mass assignable
    protected $fillable = ['recipe_id', 'ingredient_id', 'quantity', 'unit'];
}

