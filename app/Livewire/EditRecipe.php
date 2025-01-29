<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Recipe;

class EditRecipe extends Component
{
    use WithFileUploads;

    public $recipe_details;
    public $recipe_name;
    public $recipe_description;
    public $recipe_price;
    public $category_id;
    public $photo;
    public $ingredients = [];
    public $preparation_steps = [];
    public $cooking_time;
    public $dietary_information = [];
    public $cuisine_type;

    protected $rules = [
        'recipe_name' => 'required|string|max:255',
        'recipe_description' => 'required|string',
        'recipe_price' => 'nullable|numeric',
        'category_id' => 'required|exists:categories,id',
        'photo' => 'nullable|image|max:1024', // 1MB Max
        'ingredients' => 'required|array',
        'preparation_steps' => 'required|array',
        'cooking_time' => 'required|numeric',
        'dietary_information' => 'nullable|array',
        'cuisine_type' => 'nullable|string|max:255',
    ];

    public function mount($id)
    {
        $this->recipe_details = Recipe::find($id);
        $this->recipe_name = $this->recipe_details->name;
        $this->recipe_description = $this->recipe_details->description;
        $this->recipe_price = $this->recipe_details->price;
        $this->category_id = $this->recipe_details->category_id;
        $this->photo = $this->recipe_details->image;
        $this->cooking_time = $this->recipe_details->cooking_time;
        $this->cuisine_type = $this->recipe_details->cuisine_type;
        $this->ingredients = json_decode($this->recipe_details->ingredients, true) ?? [];
        $this->preparation_steps = json_decode($this->recipe_details->preparation_steps, true) ?? [];
        $this->dietary_information = json_decode($this->recipe_details->dietary_information, true) ?? [];
    }

    public function save()
    {
        $this->validate();

        // Check if the image is updated/uploaded
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
            'ingredients' => json_encode($this->ingredients),
            'preparation_steps' => json_encode($this->preparation_steps),
            'cooking_time' => $this->cooking_time,
            'dietary_information' => json_encode($this->dietary_information),
            'cuisine_type' => $this->cuisine_type,
        ]);

        session()->flash('success', 'Recipe updated successfully!');
        return $this->redirect('/recipes', navigate: true);
    }

    public function addIngredient()
    {
        $this->ingredients[] = ''; // Add an empty ingredient field
    }

    public function removeIngredient($index)
    {
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }

    public function addStep()
    {
        $this->preparation_steps[] = ''; // Add an empty preparation step field
    }

    public function removeStep($index)
    {
        unset($this->preparation_steps[$index]);
        $this->preparation_steps = array_values($this->preparation_steps);
    }

    public function render()
    {
        return view('livewire.edit-recipe')
            ->layout('admin-layout');
    }
}
