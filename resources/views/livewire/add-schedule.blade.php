<div>
    <div class="d-flex justify-content-end mb-3">
        <a href="" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addScheduleModal"><i
                class="fas fa-plus"></i> Add Schedule</a>
    </div>
    <!-- Add Schedule Modal -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addordinanceLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addScheduleForm" wire:submit.prevent="addSchedule">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" wire:model="startDate">
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" wire:model="endDate">
                        </div>
                        <div class="mb-3">
                            <label for="startShift" class="form-label">Start Shift</label>
                            <input type="time" class="form-control" id="startShift" wire:model="startShift">
                        </div>
                        <div class="mb-3">
                            <label for="endShift" class="form-label">End Shift</label>
                            <input type="time" class="form-control" id="endShift" wire:model="endShift">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Schedule</button>
                    </div>

                    <!-- Include the custom Livewire component for unique validation -->
                </form>
            </div>
        </div>
    </div>


</div>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('reloadPage', function () {
            location.reload();
        });

        Livewire.on('closeModal', function () {
            let modal = new bootstrap.Modal(document.getElementById('addScheduleModal'));
            modal.hide();
        });
    });
</script>
