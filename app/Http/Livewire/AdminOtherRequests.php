<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OtherRequests;

class AdminOtherRequests extends Component
{
    public $otherRequests;
    public $selectedRequest = null;
    public $answer = '';

    public function mount()
    {
        $this->otherRequests = OtherRequests::all();
    }

    public function selectRequest($requestId)
    {
        $this->selectedRequest = OtherRequests::find($requestId);
    }

    public function rejectRequest(OtherRequests $request)
    {
        $request->update(['status' => 'Rejected']);
        $this->otherRequests = OtherRequests::all();
    }

    public function approveRequest()
    {
        $this->validate([
            'answer' => 'required',
        ]);

        $this->selectedRequest->update(['status' => 'Approved', 'answer' => $this->answer]);

        $this->otherRequests = OtherRequests::all();
        $this->selectedRequest = null;
        $this->answer = '';
    }

    public function render()
    {
        return view('livewire.admin-other-requests');
    }
}
