<?php

namespace App\Livewire;

use Livewire\Component;

class ItemCard extends Component
{
    public $recipe;
    public function mount($recipe_details){
        $this->recipe = $recipe_details;
    }
    public function placeholder(){
        return view('livewire.skeleton.item-skeleton');
    }

    public function render()
    {
        return view('livewire.item-card');
    }
}
