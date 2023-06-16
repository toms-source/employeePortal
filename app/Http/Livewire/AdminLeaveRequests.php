<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;

class AdminLeaveRequests extends Component
{
    public $leaveRequests;

    public function mount()
    {
        $this->leaveRequests = LeaveRequest::all();
    }

    public function approve(LeaveRequest $leaveRequest)
    {
        $leaveRequest->update(['status' => 'Approved']);
        $this->leaveRequests = LeaveRequest::all();
    }

    public function deny(LeaveRequest $leaveRequest)
    {
        $leaveRequest->update(['status' => 'Denied']);
        $this->leaveRequests = LeaveRequest::all();
    }
    public function render()
    {
        return view('livewire.admin-leave-requests');
    }
}
