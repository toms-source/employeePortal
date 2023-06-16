<?php

namespace App\Http\Livewire;

use App\Models\Payadvance;
use Livewire\Component;
use Livewire\WithPagination;

class ListLoan extends Component
{
    use WithPagination;
    public $idDelete;
    protected $listeners = ['newAdded' => 'refreshList'];
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
    }
    public function render()
    {
        $query = Payadvance::query();
        return view('livewire.list-loan', [
            'loan' => $query->paginate(5),
        ]);
    }
}
