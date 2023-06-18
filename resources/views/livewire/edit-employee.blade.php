<div>
    <div class="col-8">
        <div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="editEmpLabel"
            aria-hidden="true" wire:ignore>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="saveE" method="POST">
                            @csrf
                    
                            <div class="mb-1 ml-3 mr-3">
                                <label for="employee_number" class="form-label mt-3">Employee Number</label>
                                <input wire:model="employee_numberE" type="text" name="employee_numberE" class="form-control" required>
                                @error('employee_numberE')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <div class="mb-1 ml-3 mr-3">
                                <label for="email" class="form-label mt-3">Email</label>
                                <input wire:model="emailE" type="text" name="emailE" class="form-control" required>
                                @error('emailE')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <div class="mb-1 ml-3 mr-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input wire:model="last_nameE" type="text" name="last_nameE" class="form-control" required>
                                @error('last_nameE')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <div class="mb-1 ml-3 mr-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input wire:model="first_nameE" type="text" name="first_nameE" class="form-control" required>
                                @error('first_nameE')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <div class="mb-1 ml-3 mr-3">
                                <label for="office" class="form-label">Office</label>
                                <input wire:model="officeE" type="text" name="officeE" class="form-control" required>
                                @error('officeE')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <div class="mb-1 ml-3 mr-3">
                                <label for="department" class="form-label">Department</label>
                                <input wire:model="departmentE" type="text" name="departmentE" class="form-control" required>
                                @error('departmentE')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <div class="mb-3 ml-3 mr-3">
                                <label for="employee_status" class="form-label">Employee Status</label>
                                <input wire:model="employee_statusE" type="text" name="employee_statusE" class="form-control" required>
                                @error('employee_statusE')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <div class="mb-3 ml-3 mr-3">
                                <label for="password" class="form-label">Password</label>
                                <input wire:model="passwordE" type="password" name="employee_statusE" class="form-control" required>
                                @error('passwordE')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <!-- Add more input fields as needed -->
                    
                            <button type="submit" class="btn btn-primary ml-3">Edit Employee</button>
                        </form>
                        @if ($errora)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $errora}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="employeeEdited" tabindex="-1" role="dialog"
        aria-labelledby="employeeAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeAddedModalLabel">Employee Updated</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    The Employee has been successfully updated.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('employeeEdited', () => {
            console.log('ordinanceAdded event received');

            document.getElementById('editEmployee').classList.remove('show');
            document.body.classList.remove('modal-open');
            document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'employeeEdited'));
            modalOrdinanceAdded.show();
        });
    });
</script>
