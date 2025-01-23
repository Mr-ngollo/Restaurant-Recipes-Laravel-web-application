<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashoard extends Component
{
    public function render()
    {
        return view('livewire.admin-dashoard')->layout('admin-layout');
    }
}
