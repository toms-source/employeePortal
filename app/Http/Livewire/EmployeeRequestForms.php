<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class EmployeeRequestForms extends Component
{ 
    use WithPagination;
    protected $listeners = ['newDelete' => 'refreshList'];

    public function refreshList(){
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.employee-request-forms');
    }
}
