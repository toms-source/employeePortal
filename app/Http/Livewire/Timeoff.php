<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;

class Timeoff extends Component
{
    public $start_date;
    public $end_date;
    public $reason;


    public function save()
    {
        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',
        ]);

        LeaveRequest::create([
            'user_id' => auth()->id(),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'reason' => $this->reason,
            'status' => 'Pending',
        ]);

        session()->flash('message', 'Leave Request successfully submitted.');
        

        $this->reset(['start_date', 'end_date', 'reason']);
        
        $this->emit('newAdded');
    }
    public function render()
    {
        return view('livewire.timeoff');
    }
}
