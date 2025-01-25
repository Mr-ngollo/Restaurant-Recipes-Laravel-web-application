<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddRecipeForm extends Component
{
    use WithFileUploads;

    public $currentUrl = '';
    public $recipe_name = '';
    public $recipe_price = '';
    public $recipe_description = '';
    public $category_id = '';
    public $photo = '';

    protected $rules = [
        'recipe_name' => 'required|string|max:255',
        'recipe_price' => 'required|numeric|min:0',
        'recipe_description' => 'required|string|min:10',
        'photo' => 'required|image|mimes:jpg,png,jpeg|max:1024',  // Fixed mime type validation
        'category_id' => 'required|integer|exists:categories,id',  // Ensure the category exists
    ];

    protected $messages = [
        'recipe_name.required' => 'The recipe name is required.',
        'recipe_price.required' => 'The recipe price is required.',
        'recipe_price.numeric' => 'The recipe price must be a valid number.',
        'recipe_description.required' => 'Please provide a description for the recipe.',
        'photo.required' => 'Please upload an image for the recipe.',
        'photo.mimes' => 'The image must be a file of type: jpg, png, jpeg.',
        'photo.max' => 'The image must not exceed 1MB.',
        'category_id.required' => 'Please select a category.',
        'category_id.exists' => 'The selected category is invalid.',
    ];

    public function save()
    {
        $this->validate();

        // Store the image and get its path
        $photoPath = $this->photo->store('recipe_images', 'public');

        // Save the recipe data
        Recipe::create([
            'name' => $this->recipe_name,
            'description' => $this->recipe_description,
            'price' => $this->recipe_price,
            'image' => $photoPath,  // Save the file path
            'category_id' => $this->category_id,
        ]);

        // Flash success message
        session()->flash('message', 'Recipe added successfully!');

        // Reset form inputs
        $this->reset(['recipe_name', 'recipe_price', 'recipe_description', 'category_id', 'photo']);

        // Redirect to recipes list
        return $this->redirect('/recipes');
    }

    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/', $current_url);
        $this->currentUrl = isset($explode_url[3], $explode_url[4]) ? $explode_url[3] . ' ' . $explode_url[4] : 'Unknown';

        return view('livewire.add-recipe-form')
            ->layout('admin-layout');
    }
}
