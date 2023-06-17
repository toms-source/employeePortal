<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListLeave extends Component
{
    use WithPagination;
    public $idDelete;
    protected $listeners = ['newAdded' => 'refreshList','newApproved' => 'refreshList','newDenied' => 'refreshList'];
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
        $this->emit('newDelete');
    }

    public function render()
    {
        $user = Auth::user();
        $id = Auth::id();
        $user_id = "%" . $id . "%";

        $query = LeaveRequest::query()
            ->where('status', 'like', "Pending")
            ->where('user_id', 'like', $user_id);

        return view('livewire.list-leave', [
            'leave' => $query->paginate(5),
        ]);
    }
}
