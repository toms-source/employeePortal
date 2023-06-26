<div>
    <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
        {{-- grid --}}
        <div class="col">
            <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded">
                <a href="{{ route('payroll') }}">Payroll</a> > {{ $employee->first_name }}
                {{ $employee->last_name }} > Manage Payslip
            </h5>
            <div class="shadow border fw-bold p-3 mb-3 bg-white rounded">
                <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded">{{ $employee->first_name . ' ' . $employee->last_name }} </h5> 
                @if ($payslipRecord->status == "Pending")
                            <div>  <button class="btn btn-success" wire:click="editThis">Edit Payroll</button></div>
                @endif
            <div class="card">
            <div class="card-body">
                <div class="card-title"><h3>Earnings:</h3></div>
                    <div class="card-body py-5" style="column-count: 2;">
                        Cutoff {{' : '. $payslipRecord->cutoff_from . '-'. $payslipRecord->cutoff_to}}<br><br>
                        Total Regular Hours {{' : '. $payslipRecord->regular_hours_total}}<br>
                        Hourly Rate {{' :s '. $employee->salary_rate}}<br><br>
                        OT Hours {{' : '. $payslipRecord->regular_hours_total}}<br>
                        OT Rate {{' : '. $salaryRecord->ot_rate}}<br><br>
                        Total Taxable Income {{' : '. $payslipRecord->gross_pay}}<br>
                        Non-Taxable Income {{' : '. $salaryRecord->allowance}}<br><br>
                        <h5 class="fw-bold">Total Gross Income: {{$salaryRecord->allowance + $payslipRecord->gross_pay}}</h5> 
                    </div>
                </div>
            </div>    
            <div class="card mt-3">
            <div class="card-body">
                <div class="card-title"><h3>Deductions: </h3></div>
                <div class="card-body py-5" style="column-count: 2;">
                    Taxable Income {{' : '. $salaryRecord->allowance + $payslipRecord->gross_pay}}<br><br>
                    Tax BIR {{' : '. $salaryRecord->tax_bir}}<br>
                    Tax SSS {{' : '. $salaryRecord->tax_sss}}<br><br>
                    Tax Phil Health {{' : '. $salaryRecord->tax_phealth}}<br>
                    Tax Pag Ibig {{' : '. $salaryRecord->tax_pibig}}<br>
                    Total Deductions {{' : '. $payslipRecord->deductions}}<br><br>
                    <h5 class="fw-bold">Total Gross Income: {{$payslipRecord->net_pay}}</h5> 
                </div>
            </div>
        </div>
    </div>
</div>


