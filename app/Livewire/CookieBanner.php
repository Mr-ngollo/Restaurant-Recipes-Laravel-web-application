<?php

namespace App\Livewire;

use Livewire\Component;

class CookieBanner extends Component
{
    public function dismissCookieBanner()
    {
        session()->put('cookie_banner_dismissed', true);
    }

    public function render()
    {
        return view('livewire.cookie-banner')->title('RestRecipes | Cookies');
    }
}
