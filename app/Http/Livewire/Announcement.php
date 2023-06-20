<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Annoucements;

class Announcement extends Component
{
    public $announcements;
    public $title;
    public $body;
    public $showModal = false;
    public $showModal2 = false;
    public $announcementId;
    public $showDeleteModal = false;
    public $deleteAnnouncementId;


    public function closeModal()
    {
        $this->reset(['title', 'body', 'showModal', 'announcementId']);
    }

    public function openModal($announcementId = null)
    {
        $this->announcementId = $announcementId;
        $announcement = Annoucements::find($announcementId);

        if ($announcement) {
            $this->title = $announcement->title;
            $this->body = $announcement->body;
        }

        $this->showModal = true;
    }

    public function createAnnouncement()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($this->announcementId) {
            $announcement = Annoucements::findOrFail($this->announcementId);
            $announcement->update([
                'title' => $this->title,
                'body' => $this->body,
            ]);
        } else {
            $announcement = new Annoucements([
                'title' => $this->title,
                'body' => $this->body,
                'user_id' => auth()->user()->id,
            ]);
            $announcement->save();
        }

        $this->closeModal();
        $this->reset(['title', 'body', 'announcementId']);
    }
    public function confirmDelete($announcementId)
    {
        $this->deleteAnnouncementId = $announcementId;
        $this->showDeleteModal = true;
    }

    public function deleteAnnouncement()
    {
        $announcement = Annoucements::findOrFail($this->deleteAnnouncementId);
        $announcement->delete();

        $this->closeDeleteModal();
        $this->reset('deleteAnnouncementId');
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
    }
    public function render()
    {
        $this->announcements = Annoucements::with('user')->get();

        return view('livewire.announcement');
    }
}
