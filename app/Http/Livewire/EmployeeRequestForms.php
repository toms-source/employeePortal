<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class EmployeeRequestForms extends Component
{ use WithPagination;
    public function render()
    {
        return view('livewire.employee-request-forms');
    }
}
