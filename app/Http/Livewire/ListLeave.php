<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;
use Livewire\WithPagination;

class ListLeave extends Component
{
    use WithPagination;
    public $idDelete;
    protected $listeners = ['newAdded' => 'refreshList'];

    public function refreshList(){
        $this->resetPage();
    }

    public function deleteRequ($id)
    { 
        $this->emit('deleteReq');
        $this->idDelete = $id;
    }

    public function deleteRequest(){
        $query = LeaveRequest::query();

        $id = '%' . $this->idDelete . '%';
        $query  = LeaveRequest::where('id', 'like', $id)->delete();
        
        $this->resetPage();
    }

    public function render()
    {
        $query = LeaveRequest::query();
        return view('livewire.list-leave', [
            'leave' => $query->paginate(5),
        ]);
    }
}
