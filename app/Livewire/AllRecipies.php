<?php

namespace App\Livewire;

use Livewire\Component;

class AllRecipies extends Component
{
    public function render()
    {
        $title = 'All Recipes';
        return view('livewire.all-recipies', compact('title'));
    }
}
