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
        return redirect()->route('employee.calendar', ['employeeId' => $employeeId]);
    }
    


    public function render()
    {
        return view('livewire.schedule');
    }
}
