<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DocumentRequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListDocument extends Component
{
    use WithPagination;
    public $idDelete;
    protected $listeners = ['newAdded' => 'refreshList','newApproved' => 'refreshList','newDenied' => 'refreshList'];
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
        $this->emit('newDelete');
    }

    public function render()
    {
        $user = Auth::user();
        $id = Auth::id();
        $user_id = "%" . $id . "%";

        $query = DocumentRequest::query()
            ->where('status', 'like', "Pending")
            ->where('user_id', 'like', $user_id);

        return view('livewire.list-document', [
            'docuReq' => $query->paginate(5),
            //,['*'],'docu'
        ]);
    }
}
