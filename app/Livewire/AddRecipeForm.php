<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddRecipeForm extends Component
{
    use WithFileUploads;
    public $currentUrl = '';
    public $recipe_name = '';
    public $recipe_price = '';
    public $recipe_description = '';
    public $photo = '';

    public function save(){
        $this->validate([
            'recipe_name' => 'required',
            'recipe_price' => 'required|integer',
            'recipe_description' => 'required',
            'photo' => 'required|image|mime:jpg,png|max:1024',
        ]);

        $recipe = new Recipe();
        $recipe ->name = $this->recipe_name;
        $recipe ->description = $this->recipe_description;
        $recipe ->price = $this->recipe_price;
        $recipe ->image = $this->photo;
        $recipe ->category_id = $this->category_id;
        $recipe ->save();

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
