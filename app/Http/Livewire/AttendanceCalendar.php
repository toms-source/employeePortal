<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceCalendar extends Component
{    
    public $myData = 'Hello, JavaScript!';
    public $checkintime;
    public $checkouttime;

    public function mount()
    {
        $userId = Auth::id();
        $today = now()->format('Y-m-d');

        $attendance = Attendance::where('user_id', $userId)
            ->whereDate('check_in', $today)
            ->first();

            if ($attendance) {
                $checkInTime = Carbon::parse($attendance->check_in)->format('H:i');
                $checkOutTime = Carbon::parse($attendance->check_out)->format('H:i');
                $this->checkintime = $checkInTime;
                $this->checkouttime = $checkOutTime;
            }
    }
    public function checkIn()
    {
        $userId = session('user_id') ?? auth()->user()->id;
        $today = Carbon::today();

        // Check if a record exists for today
        $existingAttendance = Attendance::where('user_id', $userId)
            ->whereDate('check_in', $today)
            ->first();

        // If record exists, emit a message and return early
        if ($existingAttendance) {
            $this->emit('message', 'You have already checked in today!');
            return;
        }

        $checkInTime = Carbon::now();
        // Create the attendance record
        Attendance::create([
            'user_id' => $userId,
            'check_in' => $checkInTime,
        ]);

        $this->emit('message', 'Checked in successfully!');
    }

    public function checkOut()
    {
        $checkOutTime = Carbon::now();
        $userId = session('user_id') ?? auth()->user()->id;

        // Here you can update the record in the database for check out
        $attendance = Attendance::where('user_id', $userId)->latest()->first();
        if ($attendance) {
            $attendance->update([
                'check_out' => $checkOutTime,
            ]);
        }

        $this->emit('message', 'Checked out successfully!');
    }


    public function render()
    {
        return view('livewire.attendance-calendar');
    }
}
