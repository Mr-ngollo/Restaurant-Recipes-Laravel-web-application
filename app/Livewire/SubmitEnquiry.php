<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enquiry;

class SubmitEnquiry extends Component
{
    public $first_name, $last_name, $email, $phone_number, $message;


    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone_number' => 'required|max:20',
        'message' => 'required|string',
    ];

    public function submitEnquiry()
    {
        $this->validate();

        Enquiry::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'message' => $this->message,
        ]);

        session()->flash('message', 'Enquiry submitted successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.submit-enquiry');
    }
}
