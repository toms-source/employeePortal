<?php

namespace App\Http\Livewire;

use App\Models\Payadvance;
use Livewire\Component;

class ListLoan extends Component
{
    public function render()
    {
        $query = Payadvance::query();
        return view('livewire.list-loan', [
            'loan' => $query->paginate(5),
        ]);
    }
}
