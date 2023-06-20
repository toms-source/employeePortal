<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Models\Schedule;

class EmployeeCalendar extends Component
{
    public $employee;
    public $attendanceRecords;
    public $startDate;
    public $endDate;
    public $startShift;
    public $endShift;
    public $scheduleRecords;
    
    public function mount($id)
    {
        $this->employee = User::findOrFail($id);
        $this->attendanceRecords = Attendance::where('user_id', $id)->get();
        $this->scheduleRecords = Schedule::where('user_id', $id)->get();
    }

    public function loadAttendanceRecords()
    {
        $this->attendanceRecords = Attendance::where('user_id', $this->employeeId)->get();
        $this->scheduleRecords = Schedule::where('user_id', $this->employeeId)->get();
    }

    public function render()
    {
        return view('livewire.employee-calendar', [
            'employee' => $this->employee,
            'attendanceRecords' => $this->attendanceRecords,
            'scheduleRecords' => $this->scheduleRecords
        ]);
    }
    
}
