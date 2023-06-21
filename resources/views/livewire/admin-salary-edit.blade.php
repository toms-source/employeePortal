


<div>
    <div class="col-8">
        

<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="editEmpLabel"
aria-hidden="true" wire:ignore.self>
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
                    <label for="nameSE" class="form-label mt-3">Salary Name</label>
                    <input wire:model="nameSE" type="text" name="nameSE" class="form-control" required>
                    @error('nameSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-1 ml-3 mr-3">
                    <label for="descriptionSE" class="form-label mt-3">Description</label>
                    <input wire:model="descriptionSE" type="text" name="descriptionSE" class="form-control" required>
                    @error('descriptionSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-1 ml-3 mr-3">
                    <label for="daily_rateSE" class="form-label">Daily Rate</label>
                    <input wire:model="daily_rateSE" type="number" name="daily_rateSE" class="form-control" required>
                    @error('daily_rateSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-1 ml-3 mr-3">
                    <label for="hourly_rateSE" class="form-label">Hourly Rate</label>
                    <input wire:model="hourly_rateSE" type="number" name="hourly_rateSE" class="form-control" required>
                    @error('hourly_rateSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-1 ml-3 mr-3">
                    <label for="tax_birSE" class="form-label">BIR Tax</label>
                    <input wire:model="tax_birSE" type="number" name="tax_birSE" class="form-control" required>
                    @error('tax_birSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-1 ml-3 mr-3">
                    <label for="tax_sssSE" class="form-label">SSS Tax</label>
                    <input wire:model="tax_sssSE" type="number" name="tax_sssSE" class="form-control" required>
                    @error('tax_sssSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-1 ml-3 mr-3">
                    <label for="tax_phealthSE" class="form-label">PhilHealth Tax</label>
                    <input wire:model="tax_phealthSE" type="number" name="tax_phealthSE" class="form-control" required>
                    @error('tax_phealthSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-1 ml-3 mr-3">
                    <label for="tax_pibigSE" class="form-label">Pag-ibig Tax</label>
                    <input wire:model="tax_pibigSE" type="number" name="tax_pibigSE" class="form-control" required>
                    @error('tax_pibigSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-1 ml-3 mr-3">
                    <label for="ot_rateSE" class="form-label">OT Rate</label>
                    <input wire:model="ot_rateSE" type="number" name="ot_rateSE" class="form-control" required>
                    @error('ot_rateSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-1 ml-3 mr-3">
                    <label for="allowanceSE" class="form-label">Allowance</label>
                    <input wire:model="allowanceSE" type="number" name="allowanceSE" class="form-control" required>
                    @error('allowanceSE')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <!-- Add more input fields as needed -->
        
                <button type="submit" class="btn btn-primary ml-3">Edit Employee</button>
            </form>
           
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



