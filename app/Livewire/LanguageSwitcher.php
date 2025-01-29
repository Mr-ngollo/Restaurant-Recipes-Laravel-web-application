<?php 

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSwitcher extends Component
{
    public $currentLocale;

    public function mount()
    {
        $this->currentLocale = Session::get('locale', config('app.locale'));
    }

    public function switchLanguage($locale)
    {
        Session::put('locale', $locale);
        App::setLocale($locale);
        $this->currentLocale = $locale;

        return redirect()->route(request()->route()->getName());
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
