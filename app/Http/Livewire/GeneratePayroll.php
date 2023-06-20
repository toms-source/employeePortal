<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\User;
use App\Models\payrollList;
use App\Models\SalaryTypes;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class GeneratePayroll extends Component
{
    public $payslips;
    public $selectedRequest;
    public $idDeny;

    public function render()
    {
        $employees = payrollList::all();
        if ($employees->isNotEmpty()) {
            $this->payslips = $employees->map(function ($payroll) {
                return [
                    'id' => $payroll->id,
                    'cutoff_from' => $payroll->cutoff_from,
                    'cutoff_to' => $payroll->cutoff_to,
                    'employee_name' => $payroll->user->first_name . ' ' . $payroll->user->last_name,
                    'present_days_total' => $payroll->present_days_total,
                    'regular_hours_total' => $payroll->regular_hours_total,
                    'gross_pay' => $payroll->gross_pay,
                    'deductions' => $payroll->deductions,
                    'allowance' => $payroll->allowance,
                    'net_pay' => $payroll->net_pay,
                    'status' => $payroll->status,
                ];
            });
        }

        return view('livewire.generate-payroll');
    }

    public function generatePayslips()
    {
        $users = User::all();
        
        $cutoffStartDate = $this->getCutoffStartDate();
        $cutoffEndDate = $this->getCutoffEndDate();

        $payrollList = payrollList::where('cutoff_from', $cutoffStartDate)
            ->where('cutoff_to', $cutoffEndDate)
            ->get();

        if ($payrollList->isNotEmpty()) {
            $this->payslips = $payrollList->map(function ($payroll) {
                return [
                    
                    'id' => $payroll->id,
                    'cutoff_from' => $payroll->cutoff_from,
                    'cutoff_to' => $payroll->cutoff_to,
                    'employee_name' => $payroll->user->first_name . ' ' . $payroll->user->last_name,
                    'present_days_total' => $payroll->present_days_total,
                    'regular_hours_total' => $payroll->regular_hours_total,
                    'gross_pay' => $payroll->gross_pay,
                    'deductions' => $payroll->deductions,
                    'allowance' => $payroll->allowance,
                    'net_pay' => $payroll->net_pay,
                ];
            });
        }

        foreach ($users as $user) {
            if( $user->id == 1){
                continue;
            }

            $existingPayroll = payrollList::where('user_id', $user->id)
                ->where('cutoff_from', $this->getCutoffStartDate())
                ->where('cutoff_to', $this->getCutoffEndDate())
                ->first();
    
            if ($existingPayroll) {
                continue; // Skip generating the payslip if it already exists
            }
    
            // Retrieve the attendance records for the employee
            $attendanceRecords = Attendance::where('user_id', $user->id)
                ->whereBetween('check_in', [$this->getCutoffStartDate(), $this->getCutoffEndDate()])
                ->get();
    
            // Calculate payslip details
            $presentDaysTotal = $attendanceRecords->count();
            $regularHoursTotal = $attendanceRecords->sum(function ($record) {
                $formatted_in = Carbon::parse($record->check_in);
                $formatted_out = Carbon::parse($record->check_out);
                return $formatted_out->diffInHours($formatted_in);
            });
    
            // Perform additional calculations based on the salary types model
            $salaryTypes = SalaryTypes::where('name', $user->status)->get(); // Assuming you have only one record in the salary types table

            $grossPay = $regularHoursTotal * $user->salary_rate;
            $deductions = $this->calculateDeductions($salaryTypes[0]);
            $allowance = $salaryTypes[0]->allowance;
            $netPay = $grossPay - $deductions + $allowance;
    
            // Create payrollList record
            $payrollList = payrollList::create([
                'user_id' => $user->id,
                'cutoff_from' => $this->getCutoffStartDate(),
                'cutoff_to' => $this->getCutoffEndDate(),
                'present_days_total' => $presentDaysTotal,
                'regular_hours_total' => $regularHoursTotal,
                'gross_pay' => $grossPay,
                'deductions' => $deductions,
                'allowance' => $allowance,
                'net_pay' => $netPay,
                'status' => 'Pending',
            ]);
    
            // Store the generated payslip details for display
            $this->payslips[] = [
                'id' => $payrollList->id,
                'cutoff_from' => $this->getCutoffStartDate(),
                'cutoff_to' => $this->getCutoffEndDate(),
                'employee_name' => $user->first_name . ' ' . $user->last_name,
                'present_days_total' => $presentDaysTotal,
                'regular_hours_total' => $regularHoursTotal,
                'gross_pay' => $grossPay,
                'deductions' => $deductions,
                'allowance' => $allowance,
                'net_pay' => $netPay,
                'status' => 'Pending',
            ];
        }
    
        session()->flash('message', 'Payslips generated successfully.');
    }

    private function calculateDeductions($salaryTypes)
    {
        // Perform the calculation for deductions based on gross pay and salary type
        // Example calculation:
        $taxBIR = $salaryTypes->tax_bir;
        $taxSSS = $salaryTypes->tax_sss;
        $taxPhilHealth = $salaryTypes->tax_phealth;
        $taxPagIBIG = $salaryTypes->tax_pibig;

        // Assuming the deductions are additive
        return $taxBIR + $taxSSS + $taxPhilHealth + $taxPagIBIG;
    }

    public function getCutoffStartDate() 
    {
        return Carbon::now()->firstOfMonth()->format('Y-m-d');
    }

    public function getCutoffEndDate()
    {
        return Carbon::now()->firstOfMonth()->addDays(14)->format('Y-m-d');
    }

    public function generatePayslips2nd()
    {
        $users = User::all();
        
        $cutoffStartDate = $this->getCutoffStartDate2nd();
        $cutoffEndDate = $this->getCutoffEndDate2nd();

        $payrollList = payrollList::where('cutoff_from', $cutoffStartDate)
            ->where('cutoff_to', $cutoffEndDate)
            ->get();

        if ($payrollList->isNotEmpty()) {
            $this->payslips = $payrollList->map(function ($payroll) {
                return [
                    'id' => $payroll->id,
                    'cutoff_from' => $payroll->cutoff_from,
                    'cutoff_to' => $payroll->cutoff_to,
                    'employee_name' => $payroll->user->first_name . ' ' . $payroll->user->last_name,
                    'present_days_total' => $payroll->present_days_total,
                    'regular_hours_total' => $payroll->regular_hours_total,
                    'gross_pay' => $payroll->gross_pay,
                    'deductions' => $payroll->deductions,
                    'allowance' => $payroll->allowance,
                    'net_pay' => $payroll->net_pay,
                ];
            });
        }

        foreach ($users as $user) {
            if( $user->id == 1){
                continue;
            }

            $existingPayroll = payrollList::where('user_id', $user->id)
                ->where('cutoff_from', $this->getCutoffStartDate2nd())
                ->where('cutoff_to', $this->getCutoffEndDate2nd())
                ->first();
    
            if ($existingPayroll) {
                continue; // Skip generating the payslip if it already exists
            }
    
            // Retrieve the attendance records for the employee
            $attendanceRecords = Attendance::where('user_id', $user->id)
                ->whereBetween('check_in', [$this->getCutoffStartDate2nd(), $this->getCutoffEndDate2nd()])
                ->get();
    
            // Calculate payslip details
            $presentDaysTotal = $attendanceRecords->count();
            $regularHoursTotal = $attendanceRecords->sum(function ($record) {
                $formatted_in = Carbon::parse($record->check_in);
                $formatted_out = Carbon::parse($record->check_out);
                return $formatted_out->diffInHours($formatted_in);
            });
    
            // Perform additional calculations based on the salary types model
            $salaryTypes = SalaryTypes::where('name', $user->status)->get(); // Assuming you have only one record in the salary types table

            $grossPay = $regularHoursTotal * $user->salary_rate;
            $deductions = $this->calculateDeductions2nd($salaryTypes[0]);
            $allowance = $salaryTypes[0]->allowance;
            $netPay = $grossPay - $deductions + $allowance;
    
            // Create payrollList record
            $payrollList = payrollList::create([
                'user_id' => $user->id,
                'cutoff_from' => $this->getCutoffStartDate2nd(),
                'cutoff_to' => $this->getCutoffEndDate2nd(),
                'present_days_total' => $presentDaysTotal,
                'regular_hours_total' => $regularHoursTotal,
                'gross_pay' => $grossPay,
                'deductions' => $deductions,
                'allowance' => $allowance,
                'net_pay' => $netPay,
                'status' => 'Pending',
            ]);
    
            // Store the generated payslip details for display
            $this->payslips[] = [
                'id' => $payrollList->id,
                'cutoff_from' => $this->getCutoffStartDate2nd(),
                'cutoff_to' => $this->getCutoffEndDate2nd(),
                'employee_name' => $user->first_name . ' ' . $user->last_name,
                'present_days_total' => $presentDaysTotal,
                'regular_hours_total' => $regularHoursTotal,
                'gross_pay' => $grossPay,
                'deductions' => $deductions,
                'allowance' => $allowance,
                'net_pay' => $netPay,
                'status' => 'Pending',
            ];
        }
    
        session()->flash('message', 'Payslips generated successfully.');
    }

    private function calculateDeductions2nd($salaryTypes)
    {
        // Perform the calculation for deductions based on gross pay and salary type
        // Example calculation:
        $taxBIR = $salaryTypes->tax_bir;
        $taxSSS = $salaryTypes->tax_sss;
        $taxPhilHealth = $salaryTypes->tax_phealth;
        $taxPagIBIG = $salaryTypes->tax_pibig;

        // Assuming the deductions are additive
        return $taxBIR + $taxSSS + $taxPhilHealth + $taxPagIBIG;
    }

    public function getCutoffStartDate2nd() 
    {
        return Carbon::now()->firstOfMonth()->addDays(14)->format('Y-m-d');
    }

    public function getCutoffEndDate2nd()
    {
        return Carbon::now()->lastOfMonth()->format('Y-m-d');
    }

    public function selectRequestForApproval(payrollList $loanRequest)
    {
        $this->selectedRequest = $loanRequest;
        $this->emit('showConfirmationModal');
    }

    public function confirmApprove()
    {
        if ($this->selectedRequest) {
            $this->selectedRequest->update(['status' => 'Approved']);
            $this->loanRequests = payrollList::all();
            $this->selectedRequest = null; // Clear the selected request
            $this->emit('newApproved');
            $this->emit('hideConfirmationModal');
        } else {
            // Handle error when request is not found
            dd("Request not found.");
        }
    }

    public function deny($id)
    {
        // $documentRequest->update(['status' => 'Denied']);
        // $this->documentRequests = DocumentRequest::all();
        $this->idDeny = $id;
        $this->emit('denyDocu');
    }

    public function denyConfirm(){
        $query = payrollList::query();

        $id = '%' . $this->idDeny . '%';
        $query  = payrollList::where('id', 'like', $id)->update(['status' => 'Denied']);
        
        $this->emit('newApproved');
    }
}