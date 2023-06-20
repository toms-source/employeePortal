<div>
    <button class="btn btn-primary" wire:click="openModal">Add Announcement</button>

    @if ($showModal)
    <div class="modal show d-block">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Announcement</h3>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input wire:model="title" type="text" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea wire:model="body" class="form-control" id="body"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" wire:click="createAnnouncement">Save</button>
                    <button class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-overlay" wire:click="closeModal"></div>
    @endif


    <!-- Existing Announcements -->
    @foreach ($announcements as $announcement)
        <div class="card mt-3">
            <div class="card-body px-4 py-2">
                <h3 class="card-title">{{ $announcement->title }}</h3>
                <p class="card-text">{{ $announcement->body }}</p>
                <p class="card-text">Announced by: {{ $announcement->user->first_name }}
                    {{ $announcement->user->last_name }}</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" wire:click="openModal({{ $announcement->id }})">Edit</button>
                <button class="btn btn-danger" wire:click="confirmDelete({{ $announcement->id }})">Delete</button>
            </div>
        </div>
        <hr>
    @endforeach


    @if ($showDeleteModal)
    <div class="modal show d-block">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Confirm Delete</h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this announcement?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" wire:click="deleteAnnouncement">Yes, Delete</button>
                    <button class="btn btn-secondary" wire:click="closeDeleteModal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endif
</div>
