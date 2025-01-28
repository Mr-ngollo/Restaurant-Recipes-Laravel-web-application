<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class AdminReviewsTable extends Component
{
    use WithPagination;

    public $filterRole = '';
    public $perPage = 10;
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterRole()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $reviews = Review::query()
            ->when($this->search, function ($query) {
                $query->where('review', 'like', "%{$this->search}%")
                    ->orWhereHas('user', function ($userQuery) {
                        $userQuery->where('name', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%");
                    });
            })
            ->when($this->filterRole !== '', function ($query) {
                $query->whereHas('user', function ($userQuery) {
                    $userQuery->where('role', $this->filterRole);
                });
            })
            ->with(['user', 'recipe'])
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin-reviews-table', compact('reviews'))
        ->layout('admin-layout');
    }
}
