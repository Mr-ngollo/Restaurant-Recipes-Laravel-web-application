<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enquiry;
use Livewire\WithPagination;

class ManageEnquiry extends Component
{
    use WithPagination;
    public $currentUrl;
    public $search = '';
    public $role_filter = '';
    public $perPage = 5;
    public $confirmingEnquiryDeletion = false;
    public $enquiryIdToDelete;

    protected $updatesQueryString = ['search', 'role_filter', 'perPage'];

    public function render()
    {

        $current_url = url()->current();
        $explode_url = explode('/',$current_url);

        $this->currentUrl = $explode_url[3];

        $enquiries = Enquiry::query()
            ->where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->when($this->role_filter, function ($query) {
                return $query->where('role', $this->role_filter);
            })
            ->paginate($this->perPage);

        return view('livewire.manage-enquiry', compact('enquiries'))
        ->layout('admin-layout');
    }


    public function confirmDelete($enquiryId)
    {
        $this->enquiryIdToDelete = $enquiryId;
        $this->confirmingEnquiryDeletion = true;
    }

    public function deleteEnquiry()
    {
        if ($this->enquiryIdToDelete()) {
            Enquiry::find($this->enquiryIdToDelete)->delete();
            $this->reset('confirmingEnquiryDeletion', 'enquiryIdToDelete');
            session()->flash('message', 'Enquiry deleted successfully.');
        }
    }

    public function cancelDelete()
    {
        $this->reset('confirmingEnquiryDeletion', 'enquiryIdToDelete');
        session()->flash('message', 'Enquiry deletion action cancelled.');
    }

    public function delete(Enquiry $enquiry)
    {
        $enquiry->delete();
    }
}
