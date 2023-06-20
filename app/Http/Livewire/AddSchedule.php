<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Schedule;
use Carbon\Carbon;

class AddSchedule extends Component
{
    public $user;
    public $startDate;
    public $endDate;
    public $startShift;
    public $endShift;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function addSchedule()
    {
        // Validate the input
        $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'startShift' => 'required|date_format:H:i',
            'endShift' => 'required|date_format:H:i|after:startShift',
        ]);

        // Create a new schedule
        Schedule::create([
            'user_id' => $this->user->id,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'start_shift' => $this->startShift,
            'end_shift' => $this->endShift,
        ]);

        // Reset the input fields
        $this->reset(['startDate', 'endDate', 'startShift', 'endShift']);

        // Emit an event to refresh the calendar after a schedule is added
        $this->emit('scheduleAdded');
    }

    public function render()
    {
        return view('livewire.add-schedule');
    }
}
