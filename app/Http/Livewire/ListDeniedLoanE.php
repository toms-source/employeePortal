<?php

namespace App\Http\Livewire;

use App\Models\Payadvance;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListDeniedLoanE extends Component
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

        $query = Payadvance::query()
            ->where('status', 'like', "Denied")
            ->where('user_id', 'like', $user_id);

        return view('livewire.list-denied-loan-e', [
            'denLoan' => $query->paginate(5),
            //,['*'],'docu'
        ]);
    }
}
