<?php

namespace App\Http\Livewire;

use App\Models\Payadvance;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListApprovedLoanE extends Component
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
            ->where('status', 'like', "Approved")
            ->where('user_id', 'like', $user_id);

        return view('livewire.list-approved-loan-e', [
            'appLoan' => $query->paginate(5),
            //,['*'],'docu'
        ]);
    }
}
