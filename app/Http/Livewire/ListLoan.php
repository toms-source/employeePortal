<?php

namespace App\Http\Livewire;

use App\Models\Payadvance;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListLoan extends Component
{
    use WithPagination;
    public $idDelete;
    protected $listeners = ['newAdded' => 'refreshList','newApproved' => 'refreshList','newDenied' => 'refreshList'];
    protected $paginationTheme = 'bootstrap';

    
    public function refreshList(){
        $this->resetPage();
    }

    public function deleteRequestLoan($id)
    { 
        $this->emit('deleteReqLo');
        $this->idDelete = $id;
    }

    public function deleteRequest(){
        $query = Payadvance::query();

        $id = '%' . $this->idDelete . '%';
        $query  = Payadvance::where('id', 'like', $id)->delete();
        
        $this->refreshList();
        $this->emit('newDelete');
    }
    public function render()
    {
        $user = Auth::user();
        $id = Auth::id();
        $user_id = "%" . $id . "%";

        $query = Payadvance::query()
            ->where('status', '<>', "Approved")
            ->where('user_id', 'like', $user_id);

        return view('livewire.list-loan', [
            'loan' => $query->paginate(5),
        ]);
    }
}
