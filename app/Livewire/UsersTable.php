<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $search = '';
    #[Url()]
    public $PerPage = 5;
    #[Url(history: true)]
    public $admin = '';
    #[Url(history: true)]
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';

    public $confirmingUserDeletion = false;
    public $userIdToDelete;

    public function confirmDelete($userId)
    {
        $this->userIdToDelete = $userId;
        $this->confirmingUserDeletion = true;
    }

    public function deleteUser()
    {
        if ($this->userIdToDelete) {
            User::find($this->userIdToDelete)->delete();
            $this->reset('confirmingUserDeletion', 'userIdToDelete');
            session()->flash('message', 'User deleted successfully.');
        }
    }

        public function cancelDelete()
    {
        $this->reset('confirmingUserDeletion', 'userIdToDelete');
        session()->flash('message', 'User deletion action cancelled.');
    }


    public function delete(User $user)
    {
        $user->delete();
    }

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESc' : 'ASC';
            return;
        }
        $this->sortBy = $sortByField;
        $this->sortDir = "DESC";
    }

    public function render()
    {
        return view(
            'livewire.users-table',
            [
                'users' => User::search($this->search)
                    ->when($this->admin !== '', function ($query) {
                        $query->where('role', $this->admin);
                    })
                    ->orderBy($this->sortBy, $this->sortDir)
                    ->paginate($this->PerPage)
            ]
        );
    }
}
