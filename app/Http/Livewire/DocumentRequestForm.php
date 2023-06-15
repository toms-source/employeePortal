<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DocumentRequest;

class DocumentRequestForm extends Component
{
    public $reason;

    public function save()
    {
        $this->validate([
            'reason' => 'required|string',
        ]);

        DocumentRequest::create([
            'user_id' => auth()->id(),
            'reason' => $this->reason,
            'status' => 'Pending',
        ]);

        session()->flash('message', 'Document Request successfully submitted.');

        // Clear the form input
        $this->reset(['reason']);
    }

    public function render()
    {
        return view('livewire.document-request-form');
    }
}
