<?php

namespace App\Http\Livewire;
use App\Models\Payadvance;

use Livewire\Component;

class AdminLoanRequests extends Component
{
    public $loanRequests;

    public function mount()
    {
        $this->loanRequests = Payadvance::all();
    }

    public function approve(Payadvance $loanRequest)
    {
        $loanRequest->update(['status' => 'Approved']);
        $this->loanRequests = Payadvance::all();
        $this->emit('newApproved');
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
