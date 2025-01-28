<?php

namespace App\Livewire;

use App\Models\Recipe;
use App\Models\Review;
use Livewire\Component;

class RecipeDetails extends Component
{
    public $recipeId;
    public $review, $rating;
    public $reviews;
    public $initialReviewCount = 3;
    public $recipe;

    public function mount($recipe_id){
        $this->recipe = Recipe::find($recipe_id);
        $this->loadReviews();
    }

    // public function mount($recipeId)
    // {
    //     $this->recipeId = $recipeId;

    // }

    public function loadReviews()
    {
        $this->reviews = Review::where('recipe_id', $this->recipeId)
            ->latest()
            ->get();
    }

    public function loadMore()
    {
        $this->initialReviewCount += 3;
    }

    public function render()
    {
        return view('livewire.recipe-details');
    }
}
