<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DocumentRequest;
use Livewire\WithFileUploads;


class AdminDocumentRequests extends Component
{
    use WithFileUploads;
    public $documentRequests;
    public $selectedRequest = null;
    public $document = null;
    public function mount()
    {
        $this->documentRequests = DocumentRequest::all();
    }

    public function approve(DocumentRequest $documentRequest)
    {
        $this->selectedRequest = $documentRequest;
    }

    public function deny(DocumentRequest $documentRequest)
    {
        $documentRequest->update(['status' => 'Denied']);
        $this->documentRequests = DocumentRequest::all();
    }

    public function upload()
    {
        $this->validate([
            'document' => 'required|file|max:1024', // 1MB Max
        ]);

        $filePath = $this->document->store('documents', 'public');

        $this->selectedRequest->update(['status' => 'Approved', 'file_path' => $filePath]);

        $this->documentRequests = DocumentRequest::all();
        $this->reset(['document', 'selectedRequest']);
    }
    
    public function render()
    {
        return view('livewire.admin-document-requests');
    }
}
