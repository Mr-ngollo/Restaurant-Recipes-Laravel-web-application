<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Recipe;
use App\Models\Category;

class AddRecipeForm extends Component
{
    use WithFileUploads;

    public $recipe_name, $recipe_price, $category_id, $recipe_description;
    public $photo;
    public $currentUrl;
    public $ingredients = [];
    public $preparation_steps = [];
    public $cooking_time, $cuisine_type;
    public $dietary_information = [];
    public $all_categories;

    protected $rules = [
        'recipe_name' => 'required|string|max:255',
        'recipe_price' => 'nullable|numeric',
        'category_id' => 'required|exists:categories,id',
        'recipe_description' => 'required|string',
        'photo' => 'image|required|mimes:jpg,png|max:1024',
        'ingredients' => 'required|array|min:1',
        'preparation_steps' => 'required|array|min:1',
        'cooking_time' => 'required|integer|min:1',
        'cuisine_type' => 'required|string|max:255',
        'dietary_information' => 'nullable|array',
    ];

    public function mount()
    {
        $this->all_categories = Category::all();
        $this->ingredients = [''];
        $this->preparation_steps = [''];
    }

    public function addIngredient()
    {
        $this->ingredients[] = '';
    }

    public function removeIngredient($index)
    {
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }

    public function addStep()
    {
        $this->preparation_steps[] = '';
    }

    public function removeStep($index)
    {
        unset($this->preparation_steps[$index]);
        $this->preparation_steps = array_values($this->preparation_steps);
    }

    public function save()
    {
        $this->validate();
        $path = $this->photo->store('public/photos');

        $recipe = new Recipe();
        $recipe->name = $this->recipe_name;
        $recipe->image = $path;
        $recipe->price = $this->recipe_price;
        $recipe->category_id = $this->category_id;
        $recipe->description = $this->recipe_description;
        $recipe->ingredients = json_encode($this->ingredients);
        $recipe->preparation_steps = json_encode($this->preparation_steps);
        $recipe->cooking_time = $this->cooking_time;
        $recipe->cuisine_type = $this->cuisine_type;
        $recipe->dietary_information = json_encode($this->dietary_information);

        if ($this->photo) {
            $recipe->image = $this->photo->store('recipes', 'public');
        }

        $recipe->save();

        session()->flash('success', 'Recipe added successfully!');
        return $this->redirect('/recipes', navigate: true);
    }

    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/',$current_url);

        $this->currentUrl = $explode_url[3].' '.$explode_url[4];
        return view('livewire.add-recipe-form')
        ->layout('admin-layout');
    }
}
