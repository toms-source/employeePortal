<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OtherRequests;


class OtherRequest extends Component
{
    public $request_type;
    public $request_details;

    public function save()
    {
        $this->validate([
            'request_type' => 'required|string',
            'request_details' => 'required|string',
        ]);

        OtherRequests::create([
            'user_id' => auth()->id(),
            'request_type' => $this->request_type,
            'request_details' => $this->request_details,
            'status' => 'Pending',
        ]);

        session()->flash('message', 'Request successfully submitted.');

   
        $this->reset(['request_type', 'request_details']);

        $this->emit('newAdded');
    }

    public function render()
    {
        return view('livewire.other-request');
    }
}
