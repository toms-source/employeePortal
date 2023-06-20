<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;

class EmployeeCalendar extends Component
{
    public $employee;
    public $attendanceRecords;

    public function mount($id)
    {
        $this->employee = User::with('attendance')->findOrFail($id);
        $this->attendanceRecords = Attendance::where('user_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.employee-calendar', [
            'employee' => $this->employee,
            'attendanceRecords' => $this->attendanceRecords
        ]);
    }
}
