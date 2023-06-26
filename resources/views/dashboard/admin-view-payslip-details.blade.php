
@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="d-flex">
        @Include('layouts.sidebar-admin') 
         @livewire('edit-payroll')
        @livewire('view-payslip-details', ['employee' => $employee, 'payslipRecord' => $payslipRecord[0], 'salaryRecord' => $salaryRecord[0]])
 
@endsection
@livewireScripts


