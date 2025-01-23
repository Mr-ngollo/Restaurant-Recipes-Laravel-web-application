<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show all reviews for a specific recipe
    public function index($recipeId)
    {
        $recipe = Recipe::with('reviews')->findOrFail($recipeId);
        return view('reviews.index', compact('recipe'));
    }

    // Create a new review for a recipe
    public function store(Request $request, $recipeId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $recipe = Recipe::findOrFail($recipeId);

        // Create a review for the logged-in user
        $recipe->reviews()->create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('recipes.show', $recipeId);
    }

    // Delete a review
    public function destroy($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->delete();
        return redirect()->route('recipes.show', $review->recipe_id);
    }
}
