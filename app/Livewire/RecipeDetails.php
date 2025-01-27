<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class RecipeDetails extends Component
{
    public $recipe;
    public function mount($recipe_id){
        $this->recipe = Recipe::find($recipe_id);
    }

    //adding item to cart
    // public function addToCart($productId)
    // {
    //     $cartItem = ShoppingCart::where('user_id', Auth::id())
    //         ->where('product_id', $productId)
    //         ->first();

    //     if ($cartItem) {
    //         $cartItem->quantity += 1; // increment its quantity
    //         $cartItem->save();
    //     } else {
    //         ShoppingCart::create([
    //             'user_id' => Auth::id(),
    //             'product_id' => $productId,
    //             'quantity' => 1,
    //         ]);
    //     }
    //     //dispatch
    //     $this->dispatch('cartUpdated');
    // }
    public function render()
    {
        return view('livewire.recipe-details');
    }
}
