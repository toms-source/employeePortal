<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DocumentRequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListDeniedDocuE extends Component
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
            ->where('status', 'like', "Denied")
            ->where('user_id', 'like', $user_id);

        return view('livewire.list-denied-docu-e', [
            'denDocu' => $query->paginate(5),
            //,['*'],'docu'
        ]);
    }
}
