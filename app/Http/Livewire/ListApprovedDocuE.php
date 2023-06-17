<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DocumentRequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $id = Auth::id();
        $user_id = "%" . $id . "%";

        $query = DocumentRequest::query()
            ->where('status', 'like', "%Approved%")
            ->where('user_id', 'like', $user_id);

        return view('livewire.list-approved-docu-e', [
            'docuReq' => $query->paginate(5),
            //,['*'],'docu'
        ]);
    }
}
