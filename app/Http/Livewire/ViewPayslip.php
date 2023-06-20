<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\payrollList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ViewPayslip extends Component
{
    public function render()
    {
        $user = Auth::user();
        $id = Auth::id();
        $user_id = "%" . $id . "%";

        $query = payrollList::query()
            ->where('user_id', 'like', $user_id)
            ->where('status', 'like', "Approved")->get();
            
        $query2 = User::query()
        ->where('id', 'like', $user_id)->get();

        return view('livewire.view-payslip', [
            'payslip' => $query,
            'userstuff' => $query2[0],
            //,['*'],'docu'
        ]);
    }
}
