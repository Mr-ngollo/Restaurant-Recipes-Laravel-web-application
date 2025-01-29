<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Recipe;
use App\Models\Review;
use App\Models\User;
use Livewire\Component;

class AdminDashoard extends Component
{
    public $currentUrl;

    public function render()

    {
        $current_url = url()->current();
        $explode_url = explode('/',$current_url);
        $this->currentUrl = $explode_url[3].' '.$explode_url[4];

        return view('livewire.admin-dashoard', [
            'userCount' => User::count(),
            'recipeCount' => Recipe::count(),
            'categoryCount' => Category::count(),
            'enquiryCount' => Enquiry::count(),
            'reviewCounter' => Review::count(),
        ])
        ->layout('admin-layout');
    }
}
