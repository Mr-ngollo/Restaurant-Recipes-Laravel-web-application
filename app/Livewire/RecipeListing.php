<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Recipe;

class RecipeListing extends Component
{
    public $recipes;
    public $searchTerm = '';
    public $category_id;
    public $current_recipe_id;

    public function mount($category_id, $current_recipe_id)
    {
        $this->category_id = $category_id;
        $this->current_recipe_id = $current_recipe_id;
        $this->updateRecipeList();
    }

    public function updatedSearchTerm()
    {
        $this->updateRecipeList();
    }

    public function updateRecipeList()
    {
        if ($this->category_id == 0) {
            $this->recipes = Recipe::with('category')
                ->where('id', '!=', $this->current_recipe_id)
                ->where('name', 'like', '%' . $this->searchTerm . '%')
                ->orderBy('created_at', 'DESC')
                ->limit(4)
                ->get();
        } elseif ($this->category_id == 'all') {
            $this->recipes = Recipe::with('category')
                ->where('name', 'like', '%' . $this->searchTerm . '%')
                ->get();
        } else {
            $this->recipes = Recipe::with('category')
                ->where('category_id', $this->category_id)
                ->where('id', '!=', $this->current_recipe_id)
                ->where('name', 'like', '%' . $this->searchTerm . '%')
                ->limit(4)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.recipe-listing', [
            'categories' => Category::all()
        ]);
    }
}

