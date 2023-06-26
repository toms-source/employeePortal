<div>
    {{-- In work, do what you enjoy. --}}
    <div class="col-8">
        <div class="modal fade" id="editPayroll" tabindex="-1" role="dialog" aria-labelledby="editEmpLabel"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit Payroll</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="saveE" method="POST">
                            <div class="mb-1 ml-3 mr-3">
                                <label for="hourly_rate" class="form-label">Hourly Rate</label>
                                <input wire:model="hourly_rate" type="number" name="hourly_rate" class="form-control" required>
                                @error('hourly_rate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ml-3 mr-3">
                                <label for="total_hours" class="form-label">Total Hours</label>
                                <input wire:model="total_hours" type="number" name="total_hours" class="form-control" required>
                                @error('total_hours')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ml-3 mr-3">
                                <label for="ot_rate" class="form-label">OT Rate</label>
                                <input wire:model="ot_rate" type="number" name="ot_rate" class="form-control" required>
                                @error('ot_rate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ml-3 mr-3">
                                <label for="total_hours_ot" class="form-label">OT Hours</label>
                                <input wire:model="total_hours_ot" type="number" name="total_hours_ot" class="form-control" required>
                                @error('total_hours_ot')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ml-3 mr-3">
                                <label for="allowance" class="form-label">Allowance</label>
                                <input wire:model="allowance" type="number" name="allowance" class="form-control" required>
                                @error('allowance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ml-3 mr-3">
                                <label for="tax_bir" class="form-label">Tax BIR</label>
                                <input wire:model="tax_bir" type="number" name="tax_bir" class="form-control" required>
                                @error('tax_bir')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ml-3 mr-3">
                                <label for="tax_sss" class="form-label">Tax SSS</label>
                                <input wire:model="tax_sss" type="number" name="tax_sss" class="form-control" required>
                                @error('tax_sss')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ml-3 mr-3">
                                <label for="tax_phealth" class="form-label">Tax Phil Health</label>
                                <input wire:model="tax_phealth" type="number" name="tax_phealth" class="form-control" required>
                                @error('tax_phealth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 ml-3 mr-3">
                                <label for="tax_pibig" class="form-label">Tax Pag Ibig</label>
                                <input wire:model="tax_pibig" type="number" name="tax_pibig" class="form-control" required>
                                @error('tax_pibig')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary ml-3">Edit Payroll</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="payrollEdited" tabindex="-1" role="dialog"
        aria-labelledby="employeeAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeAddedModalLabel">Payroll Updated</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    The Payroll has been successfully updated.
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
        window.livewire.on('payrollEdited', () => {
            console.log('ordinanceAdded event received');

            document.getElementById('editPayroll').classList.remove('show');
            document.body.classList.remove('modal-open');
            document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'payrollEdited'));
            modalOrdinanceAdded.show();
        });
        window.livewire.on('editPayrollz', () => {
            console.log('ordinanceAdded event received');

            // document.getElementById('editPayroll').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'editPayroll'));
            modalOrdinanceAdded.show();
        });
    });
</script>