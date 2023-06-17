<?php

namespace App\Http\Livewire;

use App\Models\DocumentRequest;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $document;
    public $loan;
    public $others;
    public $leave;

    public function render()
    {
        $this->document = DB::table('document_requests')->count();
        $this->loan = DB::table('leave_requests')->count();
        $this->others = DB::table('other_requests')->count();
        $this->leave = DB::table('leave_requests')->count();

        return view('livewire.dashboard');
    }
}
