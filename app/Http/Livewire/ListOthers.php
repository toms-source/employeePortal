<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OtherRequests;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListOthers extends Component
{   
    use WithPagination;
    public $idDelete;
    protected $listeners = ['newAdded' => 'refreshList','newApproved' => 'refreshList','newDenied' => 'refreshList'];
    protected $paginationTheme = 'bootstrap';

    
    public function refreshList(){
        $this->resetPage();
    }
    public function deleteRequestOth($id)
    { 
        $this->emit('deleteReqO');
        $this->idDelete = $id;
    }

    public function deleteRequest(){
        $query = OtherRequests::query();

        $id = '%' . $this->idDelete . '%';
        $query  = OtherRequests::where('id', 'like', $id)->delete();
        
        $this->refreshList();
        $this->emit('newDelete');
    }

    public function render()
    {
        $user = Auth::user();
        $id = Auth::id();
        $user_id = "%" . $id . "%";

        $query = OtherRequests::query()
            ->where('status', '<>', "Approved")
            ->where('user_id', 'like', $user_id);

        return view('livewire.list-others', [
            'otherReq' => $query->paginate(5),
            //,['*'],'docu'
        ]);
    }
}
