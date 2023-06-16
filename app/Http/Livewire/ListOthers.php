<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OtherRequests;
use Livewire\WithPagination;
class ListOthers extends Component
{   
    use WithPagination;
    public $idDelete;
    protected $listeners = ['newAdded' => 'refreshList'];
    protected $paginationTheme = 'bootstrap';

    
    public function refreshList(){
        $this->resetPage('other');
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
    }

    public function render()
    {
        $query = OtherRequests::query();
        return view('livewire.list-others', [
            'otherReq' => $query->paginate(5,['*'],'other'),
            //,['*'],'docu'
        ]);
    }
}
