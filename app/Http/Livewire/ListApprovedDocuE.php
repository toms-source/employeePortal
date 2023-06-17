<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DocumentRequest;
use Livewire\WithPagination;

class ListApprovedDocuE extends Component
{
    use WithPagination;
    protected $listeners = ['newApproved' => 'refreshList'];
    protected $paginationTheme = 'bootstrap';

    
    public function refreshList(){
        $this->resetPage();
    }

    public function render()
    {
        $query = DocumentRequest::query()->where('status', 'like', "%Approved%");
        return view('livewire.list-approved-docu-e', [
            'docuReq' => $query->paginate(5),
            //,['*'],'docu'
        ]);
    }
}
