
@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="d-flex">
        @Include('layouts.sidebar-admin')
        <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
            {{-- grid --}}
            <div class="col">
                <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded">

                    <a href="{{ route('payroll') }}">Payroll</a> > {{ $employee->first_name }}
                    {{ $employee->last_name }} > Manage Payslip
                </h5>
                <div class="shadow border fw-bold p-3 mb-3 bg-white rounded">
                    <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded">{{ $employee->first_name . ' ' . $employee->last_name }} </h5> 
                    {{-- @if ($payslipRecord[0]->status == "Pending")
                              <div>  <button class="btn btn-success" wire:click="editThis">Edit Payroll</button></div>
                    @endif --}}
                <div class="card">
                <div class="card-body">
                    <div class="card-title"><h3>Earnings:</h3></div>
                        <div class="card-body py-5" style="column-count: 2;">
                            Cutoff {{' : '. $payslipRecord[0]->cutoff_from . '-'. $payslipRecord[0]->cutoff_to}}<br><br>
                            Total Regular Hours {{' : '. $payslipRecord[0]->regular_hours_total}}<br>
                            Hourly Rate {{' : '. $employee->salary_rate}}<br><br>
                            OT Hours {{' : '. $payslipRecord[0]->regular_hours_total}}<br>
                            Hourly Rate {{' : '. $salaryRecord[0]->ot_rate}}<br><br>
                            Total Taxable Income {{' : '. $payslipRecord[0]->gross_pay}}<br>
                            Non-Taxable Income {{' : '. $salaryRecord[0]->allowance}}<br><br>
                            <h5 class="fw-bold">Total Gross Income: {{$salaryRecord[0]->allowance + $payslipRecord[0]->gross_pay}}</h5> 
                        </div>
                    </div>
                </div>    
                <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title"><h3>Deductions: </h3></div>
                    <div class="card-body py-5" style="column-count: 2;">
                        Taxable Income {{' : '. $salaryRecord[0]->allowance + $payslipRecord[0]->gross_pay}}<br><br>
                        Tax BIR {{' : '. $salaryRecord[0]->tax_bir}}<br>
                        Tax SSS {{' : '. $salaryRecord[0]->tax_sss}}<br><br>
                        Tax Phil Health {{' : '. $salaryRecord[0]->tax_phealth}}<br>
                        Tax Pag Ibig {{' : '. $salaryRecord[0]->tax_pibig}}<br>
                        Total Deductions {{' : '. $payslipRecord[0]->deductions}}<br><br>
                        <h5 class="fw-bold">Total Gross Income: {{$payslipRecord[0]->net_pay}}</h5> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@livewireScripts


