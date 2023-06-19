<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;
use Livewire\WithPagination;

class AdminLeaveRequests extends Component
{
    use WithPagination;
    public $idDeny;
    public $leaveRequests;
    public $selectedRequest = null;

    public function mount()
    {
        $this->leaveRequests = LeaveRequest::all();
    }

    public function deny($id)
    {
        // $documentRequest->update(['status' => 'Denied']);
        // $this->documentRequests = DocumentRequest::all();
        $this->idDeny = $id;
        $this->emit('denyDocu');
    }

    public function denyConfirm(){
        $query = LeaveRequest::query();

        $id = '%' . $this->idDeny . '%';
        $query  = LeaveRequest::where('id', 'like', $id)->update(['status' => 'Denied']);
        
        $this->leaveRequests = LeaveRequest::all();
        $this->emit('newApproved');
    }

    public function selectRequestForApproval(LeaveRequest $leaveRequest)
    {
        $this->selectedRequest = $leaveRequest;
        $this->emit('showConfirmationModal');
    }

    public function confirmApprove()
    {
        if ($this->selectedRequest) {
            $this->selectedRequest->update(['status' => 'Approved']);
            $this->leaveRequests = LeaveRequest::all();
            $this->selectedRequest = null;
            $this->emit('newApproved');
            $this->emit('hideConfirmationModal');
        } else {
         
            dd("Request not found.");
        }
    }

    public function selectRequestForDenial(LeaveRequest $leaveRequest)
    {
        $this->selectedRequest = $leaveRequest;
    }

    // public function deny()
    // {
    //     if ($this->selectedRequest) {
    //         $this->selectedRequest->update(['status' => 'Denied']);
    //         $this->leaveRequests = LeaveRequest::all();
    //         $this->selectedRequest = null; 
    //         $this->emit('newDenied');
    //     } else {
           
    //         dd("Request not found.");
    //     }
    // }

    public function render()
    {
        return view('livewire.admin-leave-requests');
    }
}
