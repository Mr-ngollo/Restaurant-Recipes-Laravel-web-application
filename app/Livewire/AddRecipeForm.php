<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Recipe;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddRecipeForm extends Component
{
    use WithFileUploads;
    public $currentUrl;
    public $recipe_name = '';
    public $photo;
    public $recipe_description = '';
    public $recipe_price = '';

    public $category_id;

    public $all_categories;

    public function mount(){
        $this->all_categories = Category::all();
    }

    public function save(){
        $this->validate([
            'recipe_name' => 'required',
            'photo' => 'image|required|mimes:jpg,png|max:1024',
            'recipe_description' => 'required',
            'recipe_price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        $path = $this->photo->store('public/photos');

        $product = new Recipe();
        $product->name = $this->recipe_name;
        $product->image = $path;
        $product->description = $this->recipe_description;
        $product->price = $this->product_price;
        $product->category_id = $this->category_id;
        $product->save();

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
