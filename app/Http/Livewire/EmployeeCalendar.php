<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;

class EmployeeCalendar extends Component
{
    public $employee;
    public $attendances;

    protected $listeners = ['viewCalendar' => 'viewCalendar'];

    public function viewCalendar($employeeId)
    {
        $this->employee = $employeeId;
  
        $this->mount();
    }

    public function mount()
    {
        $this->employee = User::find($this->employee);
        dd($this->employee);
    }
    
    public function render()
    {

        return view('livewire.employee-calendar');
    }
}
