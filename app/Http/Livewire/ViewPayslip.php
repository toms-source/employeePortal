<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\payrollList;
use Illuminate\Support\Facades\Auth;

class ViewPayslip extends Component
{
    public function render()
    {
        $user = Auth::user();
        $id = Auth::id();
        $user_id = "%" . $id . "%";

        $query = payrollList::query()
            ->where('user_id', 'like', $user_id)->get();

        return view('livewire.view-payslip', [
            'payslip' => $query,
            //,['*'],'docu'
        ]);
    }
}
