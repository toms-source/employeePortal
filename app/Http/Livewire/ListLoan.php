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

    public function refreshList(){
        $this->resetPage();
    }

    public function deleteRequ($id)
    { 
        $this->emit('deleteReq');
        $this->idDelete = $id;
    }

    public function deleteRequest(){
        $query = Payadvance::query();

        $id = '%' . $this->idDelete . '%';
        $query  = Payadvance::where('id', 'like', $id)->delete();
        
        $this->resetPage();
    }
    public function render()
    {
        $query = Payadvance::query();
        return view('livewire.list-loan', [
            'loan' => $query->paginate(5),
        ]);
    }
}
