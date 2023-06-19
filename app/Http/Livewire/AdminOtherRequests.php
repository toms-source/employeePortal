<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OtherRequests;
use Livewire\WithPagination;

class AdminOtherRequests extends Component
{
    use WithPagination;
    public $idDeny;
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

    // public function rejectRequest(OtherRequests $request)
    // {
    //     $request->update(['status' => 'Denied']);
    //     $this->otherRequests = OtherRequests::all();
    //     $this->emit('newDenied');
    // }

    public function deny($id)
    {
        // $documentRequest->update(['status' => 'Denied']);
        // $this->documentRequests = DocumentRequest::all();
        $this->idDeny = $id;
        $this->emit('denyDocu');
    }

    public function denyConfirm(){
        $query = OtherRequests::query();

        $id = '%' . $this->idDeny . '%';
        $query  = OtherRequests::where('id', 'like', $id)->update(['status' => 'Denied']);
        
        $this->otherRequests = OtherRequests::all();
        $this->emit('newApproved');
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
        $this->emit('newApproved');
    }

    public function render()
    {
        return view('livewire.admin-other-requests');
    }
}
