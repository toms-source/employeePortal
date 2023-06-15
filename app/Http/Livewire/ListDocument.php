<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DocumentRequest;
use Livewire\WithPagination;

class ListDocument extends Component
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
        $query = DocumentRequest::query();

        $id = '%' . $this->idDelete . '%';
        $query  = DocumentRequest::where('id', 'like', $id)->delete();
        
        $this->resetPage();
    }

    public function render()
    {
        $query = DocumentRequest::query();
        return view('livewire.list-document', [
            'docuReq' => $query->paginate(5),
        ]);
    }
}
