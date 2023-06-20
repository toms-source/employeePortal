<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminEmployee extends Component
{
    public function render()
    {
        $employees = User::all();
        return view('livewire.admin-employee', compact('employees'));
    }
}
