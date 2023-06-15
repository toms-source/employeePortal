<?php

namespace App\Http\Livewire;
use App\Models\Payadvance;
use Livewire\Component;

class Loan extends Component
{
    public $amount;
    public $reason;

    public function save()
    {
        $this->validate([
            'amount' => 'required|numeric|min:0',
            'reason' => 'required|string',
        ]);

        Payadvance::create([
            'user_id' => auth()->id(),
            'amount' => $this->amount,
            'reason' => $this->reason,
            'status' => 'Pending',
        ]);

        session()->flash('message', 'Pay Advance Request successfully submitted.');

      
        $this->reset(['amount', 'reason']);

        
        $this->emit('newAdded');
    }

    public function render()
    {
        return view('livewire.loan');
    }
}
