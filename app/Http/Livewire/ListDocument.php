<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DocumentRequest;
use Livewire\WithPagination;

class ListDocument extends Component
{
use WithPagination;


    
    
    public function render()
    {
        $query = DocumentRequest::query();
        return view('livewire.list-document', [
            'docuReq' => $query->paginate(5),
        ]);
    }
}
