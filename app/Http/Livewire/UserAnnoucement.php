<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Annoucements;

class UserAnnoucement extends Component
{
    public $announcements;
    
    public function mount()
    {
        $this->announcements = Annoucements::all();
    }

    public function render()
    {
        return view('livewire.user-annoucement');
    }
}
