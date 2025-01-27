<?php

namespace App\Livewire;

use Livewire\Component;

class ManageUser extends Component
{
    public $currentUrl;
    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/',$current_url);

        $this->currentUrl = $explode_url[3];

        return view('livewire.manage-user')
        ->layout('admin-layout');
    }
}
