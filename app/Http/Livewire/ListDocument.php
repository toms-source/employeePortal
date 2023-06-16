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
    protected $paginationTheme = 'bootstrap';

    
    public function refreshList(){
        $this->resetPage();
    }
    public function deleteRequestDocu($id)
    { 
        $this->emit('deleteReqD');
        $this->idDelete = $id;
    }

    public function deleteRequest(){
        $query = DocumentRequest::query();

        $id = '%' . $this->idDelete . '%';
        $query  = DocumentRequest::where('id', 'like', $id)->delete();
        
        $this->refreshList();
    }

    public function render()
    {
        $query = DocumentRequest::query();
        return view('livewire.list-document', [
            'docuReq' => $query->paginate(5),
            //,['*'],'docu'
        ]);
    }
}
