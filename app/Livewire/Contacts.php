<?php

namespace App\Livewire;

use Livewire\Component;

class Contacts extends Component
{
        public function render()
    {
        return view('livewire.contacts')->title('RestRecipes | Contact us');
    }
}
