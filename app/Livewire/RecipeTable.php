<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class RecipeTable extends Component
{

    use WithPagination;

    public $perPage = 5;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $search = '';
    public $currentUrl;

    public function setSortBy($sortColum){
        if ($this->sortBy == $sortColum) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortColum;
        $this->sortDir = 'ASC';
    }

    public function delete($id){
        $recipe = Recipe::find($id);

        $recipe->delete();

        return $this->redirect('/recipes', navigate: true);
    }
    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/',$current_url);

        $this->currentUrl = $explode_url[3];

        return view('livewire.recipe-table',[
            'recipes' => Recipe::with('category')->search($this->search)
            ->orderBy($this->sortBy,$this->sortDir)
            ->paginate($this->perPage)
        ]);
    }
}
