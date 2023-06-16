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
    protected $paginationTheme = 'bootstrap';

    
    public function refreshList(){
        $this->resetPage();
    }

    public function deleteRequestLeave($id)
    { 
        $this->emit('deleteReqLe');
        $this->idDelete = $id;
    }

    public function deleteRequest(){
        $query = LeaveRequest::query();

        $id = '%' . $this->idDelete . '%';
        $query  = LeaveRequest::where('id', 'like', $id)->delete();
        
        $this->refreshList();
    }

    public function render()
    {
        $query = LeaveRequest::query();
        return view('livewire.list-leave', [
            'leave' => $query->paginate(5),
        ]);
    }
}
