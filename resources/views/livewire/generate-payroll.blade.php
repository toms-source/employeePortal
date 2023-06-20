{{-- <div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h2>Payslip Generator</h2>

    <form wire:submit.prevent="generatePayslip">
        <div class="form-group">
            <label for="payrollListId">Select Payroll List:</label>
            <select wire:model="payrollListId" class="form-control">
                <option value="">-- Select Payroll List --</option>
                @foreach ($userz as $list)
                    <option value="{{ $list->id }}">{{ $list->cutoff_from }} - {{ $list->cutoff_to }}</option>
                @endforeach
            </select>
            @error('payrollListId')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Generate Payslip</button>
    </form>

    @if ($payrollListId)
        <h3>Payslip Details</h3>

        @if ($payrollList)
            <ul>
                <li><strong>Cutoff From:</strong> {{ $payrollList->cutoff_from }}</li>
                <li><strong>Cutoff To:</strong> {{ $payrollList->cutoff_to }}</li>
                <li><strong>Present Days Total:</strong> {{ $payrollList->present_days_total }}</li>
                <li><strong>Regular Hours Total:</strong> {{ $payrollList->regular_hours_total }}</li>
                <li><strong>Gross Pay:</strong> {{ $payrollList->gross_pay }}</li>
                <li><strong>Deductions:</strong> {{ $payrollList->deductions }}</li>
                <li><strong>Allowance:</strong> {{ $payrollList->allowance }}</li>
                <li><strong>Net Pay:</strong> {{ $payrollList->net_pay }}</li>
            </ul>
        @endif
    @endif
</div> --}}

<div>
    <h1>Generate Payroll</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div>
        <button wire:click="generatePayslips">Generate Payslips from {{$this->getCutoffStartDate()}} to {{$this->getCutoffEndDate()}}</button>
        <button wire:click="generatePayslips2nd">Generate Payslips from {{$this->getCutoffStartDate2nd()}} to {{$this->getCutoffEndDate2nd()}}</button>
    </div>

    @if ($payslips)
        <table>
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
                        {{-- <td>
                            <button class="fa fa-edit border-0" data-target="#editEmployee" type="button" data-toggle="modal" wire:click="editEmployees({{ $payslip['id'] }})"></button>
                            <a><i class="fa-solid fa-trash-can"style="color: #e61919;" wire:click="deleteEmpTry({{$payslip['id'] }})"></i></a>
                        </td> --}}
                        <td>
                            @if ($payslip['status'] == "Pending")
                                <button class="btn btn-success"
                                    wire:click="selectRequestForApproval({{ $payslip['id']  }})">Approve</button>
                                <button class="btn btn-danger" wire:click="deny({{ $payslip['id'] }})">Deny</button>
                            @endif
                        </td>
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