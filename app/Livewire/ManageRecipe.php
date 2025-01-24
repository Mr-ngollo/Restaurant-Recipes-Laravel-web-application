<?php

namespace App\Livewire;

use Livewire\Component;

class ManageRecipe extends Component
{
    public function render()
    {
        return view('livewire.manage-recipe')
        ->layout('admin-layout');
    }
}
