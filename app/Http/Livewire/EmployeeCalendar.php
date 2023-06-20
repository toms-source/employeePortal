<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;


class EmployeeCalendar extends Component
{
    public $employee;
    public $attendanceRecords;
    public $startDate;
    public $endDate;
    public $startShift;
    public $endShift;
    public function mount($id)
    {
        $this->employee = User::with('attendance')->findOrFail($id);
        $this->attendanceRecords = Attendance::where('user_id', $id)->get();
    }
    public function addSchedule()
    {
        // Validate the input
        $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
            'startShift' => 'required|date_format:H:i',
            'endShift' => 'required|date_format:H:i|after:startShift',
        ]);
    
        // Create a new schedule
        $this->employee->attendance()->create([
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'start_shift' => $this->startShift,
            'end_shift' => $this->endShift,
        ]);
    
        // Reset the input fields
        $this->reset(['startDate', 'endDate', 'startShift', 'endShift']);
    
        // Reload the employee and attendance records to include the new schedule
        $this->employee = User::with('attendance')->findOrFail($this->employee->id);
        $this->attendanceRecords = Attendance::where('user_id', $this->employee->id)->get();
    }
    


    public function loadAttendanceRecords()
    {
        $this->attendanceRecords = Attendance::where('user_id', $this->employeeId)->get();
    }


    public function render()
    {
        return view('livewire.employee-calendar', [
            'employee' => $this->employee,
            'attendanceRecords' => $this->attendanceRecords
        ]);
    }
}
