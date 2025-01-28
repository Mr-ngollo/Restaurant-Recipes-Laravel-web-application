<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;

class RecipeReviews extends Component
{
    public $recipeId;
    public $review, $rating;
    public $reviews;
    public $initialReviewCount = 3;

    protected $rules = [
        'review' => 'required|string|min:5|max:500',
        'rating' => 'required|integer|min:1|max:5',
    ];

    public function mount($recipeId)
    {
        $this->recipeId = $recipeId;
        $this->loadReviews();
    }

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

    public function submitReview()
    {
        $this->validate();

        Review::create([
            'recipe_id' => $this->recipeId,
            'user_id' => auth()->id(),
            'review' => $this->review,
            'rating' => $this->rating,
        ]);

        $this->review = '';
        $this->rating = null;

        $this->loadReviews();
        session()->flash('message', 'Review submitted successfully!');
    }

    public function render()
    {
        return view('livewire.recipe-reviews', [
            'reviews' => $this->reviews,
        ]);
    }
}
