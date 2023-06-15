<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;

class ListLeave extends Component
{
    public function render()
    {
        $query = LeaveRequest::query();
        return view('livewire.list-leave', [
            'leave' => $query->paginate(5),
        ]);
    }
}
