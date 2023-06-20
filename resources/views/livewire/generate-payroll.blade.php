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

    <div class="row">
        <div class="col-5">
            <button class="btn btn-primary w-100 mb-3" wire:click="generatePayslips">Generate Payslips from {{$this->getCutoffStartDate()}} to {{$this->getCutoffEndDate()}}</button>
        </div>
        <div class="col-2"></div> <!-- Spacer -->
        <div class="col-5">
            <button class="btn btn-primary w-100 mb-3" wire:click="generatePayslips">Generate Payslips from {{$this->getCutoffStartDate2nd()}} to {{$this->getCutoffEndDate2nd()}}</button>
        </div>
    </div>
    
    

    @if ($payslips)
    <table class="table">
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
                    <td>
                        {{-- <button class="fa fa-edit border-0" data-target="#editEmployee" type="button" data-toggle="modal" wire:click="editEmployees({{ $payslip['id'] }})"></button>
                        <a><i class="fa-solid fa-trash-can" style="color: #e61919;" wire:click="deleteEmpTry({{ $payslip['id'] }})"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    </div>
    <div class="modal fade" id="deleteEmployee" tabindex="-1" role="dialog"
    aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordinanceAddedModalLabel">Employee Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Employee?
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-5 btn btn-outline-danger" data-dismiss="modal" wire:click='deleteEmpConfirm()'>Yes</button>
                    <button type="button" class="px-5 btn btn-outline-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('deleteEmployee',() =>{
            console.log('ordinanceAdded event received');

            // document.getElementById('ordinanceDelete').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'deleteEmployee'));
            modalOrdinanceAdded.show();
        });
    });
</script>
</div>