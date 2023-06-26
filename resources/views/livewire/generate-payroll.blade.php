<div>
    <h1>Generate Payroll</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="row">
        <div class="col-6">
            <button class="btn btn-primary py-3 mb-3" wire:click="generatePayslips">Generate Payslips from {{$this->getCutoffStartDate()}} to {{$this->getCutoffEndDate()}}</button>
        </div>
        
        <div class="col-6">
            <button class="btn btn-primary py-3 mb-3" wire:click="generatePayslips2nd">Generate Payslips from {{$this->getCutoffStartDate2nd()}} to {{$this->getCutoffEndDate2nd()}}</button>
        </div>
    </div>
     
    @if ($payslips)
     <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Cutoff From</th>
                    <th>Cutoff To</th>
                    <th>Employee Name</th>
                    <th>Present Days Total</th>
                    <th>Regular Hours Total</th>
                    <th>Gross Pay</th>
                    <th>Deductions</th>
                    <th>Allowance</th>
                    <th>Net Pay</th>
                    <th>Actions</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payslips as $payslip)
                    <tr>
                        <td>{{ $payslip['cutoff_from'] }}</td>
                        <td>{{ $payslip['cutoff_to'] }}</td>
                        <td>{{ $payslip['employee_name'] }}</td>
                        <td>{{ $payslip['present_days_total'] }}</td>
                        <td>{{ $payslip['regular_hours_total'] }}</td>
                        <td>{{ $payslip['gross_pay'] }}</td>
                        <td>{{ $payslip['deductions'] }}</td>
                        <td>{{ $payslip['allowance'] }}</td>
                        <td>{{ $payslip['net_pay'] }}</td>
                        <td>
                            @if ($payslip['status'] == "Pending")
                                <button class="btn btn-success"
                                    wire:click="selectRequestForApproval({{ $payslip['id']  }})"><i class="fa-solid fa-check" ></i></button>
                                <button class="btn btn-danger" wire:click="deny({{ $payslip['id'] }})"><i class="fa-solid fa-xmark"></i></button>
                            @endif
                            
                         <a href="{{ route('employee-payslip', $payslip['id']) }}"><i class="fa fa-eye"></i></a> 
                        </td>
                        <td>{{ $payslip['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve this Payslip?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    @if ($selectedRequest)
                        <button type="button" class="btn btn-primary" wire:click="confirmApprove()">Confirm</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="denyDocu" tabindex="-1" role="dialog"
    aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordinanceAddedModalLabel">Payslip Deny</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to deny this Payslip?
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-5 btn btn-outline-danger" data-dismiss="modal" wire:click='denyConfirm()'>Yes</button>
                    <button type="button" class="px-5 btn btn-outline-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('denyDocu',() =>{
            console.log('ordinanceAdded event received');

            // document.getElementById('ordinanceDelete').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'denyDocu'));
            modalOrdinanceAdded.show();
        });
        window.livewire.on('showConfirmationModal', () => {
            $('#confirmationModal').modal('show');
        });
        window.livewire.on('hideConfirmationModal', () => {
            $('#confirmationModal').modal('hide');
        });
    });
</script>
</div>