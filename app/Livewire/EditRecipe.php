<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class EditRecipe extends Component
{
    use WithFileUploads;
    public $recipe_name = '';
    public $photo;
    public $recipe_description = '';
    public $recipe_price = '';
    public $category_id;
    public $currentUrl;
    public $all_categories;
    public $recipe_details;
    public function mount($id){
        $this->recipe_details = Recipe::find($id);
        $this->recipe_name = $this->recipe_details->name;
        $this->recipe_description = $this->recipe_details->description;
        $this->recipe_price = $this->recipe_details->price;
        $this->category_id = $this->recipe_details->category_id;
        $this->photo = $this->recipe_details->image;
        // dd($this->recipe_details);
        $this->all_categories = Category::all();
    }
    public function update(){
        //validation
        $this->validate([
            'recipe_name' => 'required|string|max:255',
            'recipe_description' => 'required|string',
            'recipe_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|max:1024', // Validate the photo
        ]);
        //check if the image update/uploaded
        if ($this->photo && !is_string($this->photo)) {
            $photoPath = $this->photo->store('photos', 'public');
        } else {
            $photoPath = $this->photo; // Keep the old image path
        }

        $this->recipe_details->update([
            'name' => $this->recipe_name,
            'description' => $this->recipe_description,
            'price' => $this->recipe_price,
            'category_id' => $this->category_id,
            'image' => $photoPath,
        ]);

        return $this->redirect('/recipes', navigate: true);
    }
    public function render()
    {
        // $current_url = url()->current();

        // $explode_url = explode('/',$current_url);
        // // dd($explode_url);
        // $this->currentUrl = $explode_url[3].' '.$explode_url[5];

        return view('livewire.edit-recipe')->layout('admin-layout');
    }
}
