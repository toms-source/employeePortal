<?php

namespace App\Http\Livewire;

use App\Models\Payadvance;
use Livewire\Component;

class AdminLoanRequests extends Component
{
    public $loanRequests;
    public $selectedRequest = null;

    public function mount()
    {
        $this->loanRequests = Payadvance::all();
    }

    public function selectRequestForApproval(Payadvance $loanRequest)
    {
        $this->selectedRequest = $loanRequest;
        $this->emit('showConfirmationModal');
    }

    public function confirmApprove()
    {
        if ($this->selectedRequest) {
            $this->selectedRequest->update(['status' => 'Approved']);
            $this->loanRequests = Payadvance::all();
            $this->selectedRequest = null; // Clear the selected request
            $this->emit('newApproved');
            $this->emit('hideConfirmationModal');
        } else {
            // Handle error when request is not found
            dd("Request not found.");
        }
    }

    public function deny(Payadvance $loanRequest)
    {
        $loanRequest->update(['status' => 'Denied']);
        $this->loanRequests = Payadvance::all();
        $this->emit('newDenied');
    }

    public function render()
    {
        return view('livewire.admin-loan-requests');
    }
}
