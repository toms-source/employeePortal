<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Schedule;

class AttendanceCalendar extends Component
{    
    public $myData = 'Hello, JavaScript!';
    public $checkintime;
    public $checkouttime;
    public $attendanceRecords = [];
    public $todayAttendance = null;
    public $scheduleRecords;
    public function mount()
    {
        $userId = Auth::id();
        $this->attendanceRecords = Attendance::where('user_id', $userId)
            ->whereDate('check_in', '>', now()->subDays(7))
            ->get()
            ->map(function ($attendance) {
                $check_in = Carbon::parse($attendance->check_in);
                $check_out = $attendance->check_out ? Carbon::parse($attendance->check_out) : null;
                return [
                    'checkInDate' => $check_in->format('Y-m-d'),
                    'checkInTime' => $check_in->format('H:i'),
                    'checkOutTime' => $check_out ? $check_out->format('H:i') : null,
                ];
            })
            ->keyBy('checkInDate')
            ->toArray();

        $this->todayAttendance = Attendance::where('user_id', $userId)
            ->whereDate('check_in', '=', now()->format('Y-m-d'))
            ->first();

        $this->scheduleRecords = Schedule::where('user_id', $userId)->get();
    }
    
    public function checkIn()
    {
        $userId = session('user_id') ?? auth()->user()->id;
        $today = Carbon::today();

        $existingAttendance = Attendance::where('user_id', $userId)
            ->whereDate('check_in', $today)
            ->first();

        if ($existingAttendance) {
            $this->emit('message', 'You have already checked in today!');
            return;
        }

        $checkInTime = Carbon::now();
        Attendance::create([
            'user_id' => $userId,
            'check_in' => $checkInTime,
        ]);
 
        $this->emit('message', 'Checked in successfully!');
        $this->emit('pageReload');
    }

    public function checkOut()
    {
        $checkOutTime = Carbon::now();
        $userId = session('user_id') ?? auth()->user()->id;

        $attendance = Attendance::where('user_id', $userId)->latest()->first();
        if ($attendance) {
            $attendance->update([
                'check_out' => $checkOutTime,
            ]);
        }
      
        $this->emit('message', 'Checked out successfully!');
        $this->emit('pageReload');
    }


    public function render()
    {
        return view('livewire.attendance-calendar', [
            'scheduleRecords' => $this->scheduleRecords,
        ]);
    }
}
