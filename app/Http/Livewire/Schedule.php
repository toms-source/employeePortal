<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Schedule extends Component
{
    public $employees;

    public function mount()
    {
        $this->employees = User::where('employee_status', 'hired')->get();
    }

    public function viewCalendar($employeeId)
    {
        $this->emitTo('employee-calendar', 'loadData', $employeeId);
    }
    
    
    


    public function render()
    {
        dd($this->employees);
        return view('livewire.schedule');
    }
}
