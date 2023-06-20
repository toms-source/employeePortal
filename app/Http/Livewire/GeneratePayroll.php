<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\User;
use App\Models\payrollList;
use App\Models\SalaryTypes;
use Carbon\Carbon;
use Livewire\Component;

class GeneratePayroll extends Component
{
    // public $employeeId;
    // public $payslips;

    // public function render()
    // {
    //     $employees = User::all();

    //     return view('livewire.generate-payroll', [
    //         'employees' => $employees,
    //     ]);
    // }

    // public function generatePayslips()
    // {
        
    //     $users = User::all();

    //     foreach ($users as $user) {
    //         if($user->id == 1){
    //             continue;
    //         }
    //         $existingPayroll = payrollList::where('user_id', $user->id)
    //             ->where('cutoff_from', $this->getCutoffStartDate())
    //             ->where('cutoff_to', $this->getCutoffEndDate())
    //             ->first();

    //         if ($existingPayroll) {
    //             continue; // Skip generating the payslip if it already exists
    //         }

    //         // Retrieve the attendance records for the employee
    //         $attendanceRecords = Attendance::where('user_id', $user->id)
    //             ->whereBetween('check_in', [$this->getCutoffStartDate(), $this->getCutoffEndDate()])
    //             ->get();

    //         // Calculate payslip details
    //         $presentDaysTotal = $attendanceRecords->count();
    //         $regularHoursTotal = $attendanceRecords->sum(function ($record) {
    //             $formatted_in = Carbon::parse($record->check_in);
    //             $formatted_out = Carbon::parse($record->check_out);
    //             return $formatted_out->diffInHours($formatted_in);
    //         });

    //         // Perform additional calculations based on the salary types model
    //         $salaryTypes = SalaryTypes::where('name', $user->employee_status)->get(); // Assuming you have only one record in the salary types table
    //         // if (!$salaryTypes) {
    //         //     continue; // Skip generating the payslip if it already exists
    //         // }

    //         $grossPay = $regularHoursTotal * $user->salary_rate;
    //         $deductions = $this->calculateDeductions($salaryTypes[0]);
    //         $allowance = $salaryTypes[0]->allowance;
    //         $netPay = $grossPay - $deductions + $allowance;

    //         // Create payrollList record
    //         $payrollList = payrollList::create([
    //             'user_id' => $user->id,
    //             'cutoff_from' => $this->getCutoffStartDate(),
    //             'cutoff_to' => $this->getCutoffEndDate(),
    //             'present_days_total' => $presentDaysTotal,
    //             'regular_hours_total' => $regularHoursTotal,
    //             'gross_pay' => $grossPay,
    //             'deductions' => $deductions,
    //             'allowance' => $allowance,
    //             'net_pay' => $netPay,
    //         ]);

    //         // Store the generated payslip details for display
    //         $this->payslips[] = [
    //             'cutoff_from' => $this->getCutoffStartDate(),
    //             'cutoff_to' => $this->getCutoffEndDate(),
    //             'employee_name' => $user->first_name . ' ' . $user->last_name,
    //             'present_days_total' => $presentDaysTotal,
    //             'regular_hours_total' => $regularHoursTotal,
    //             'gross_pay' => $grossPay,
    //             'deductions' => $deductions,
    //             'allowance' => $allowance,
    //             'net_pay' => $netPay,
    //         ];
    //     }

    //     // dd($this->payslips);
    //     session()->flash('message', 'Payslips generated successfully.');
    
    // }

    // private function calculateDeductions($salaryTypes)
    // {
    //     // Perform the calculation for deductions based on gross pay and salary type
    //     // Example calculation:
    //     $taxBIR =$salaryTypes->tax_bir;
    //     $taxSSS =$salaryTypes->tax_sss;
    //     $taxPhilHealth =$salaryTypes->tax_phealth;
    //     $taxPagIBIG =$salaryTypes->tax_pibig;

    //     // Assuming the deductions are additive
    //     return $taxBIR + $taxSSS + $taxPhilHealth + $taxPagIBIG;
    // }

    // public function getCutoffStartDate()
    // {
    //     return Carbon::now()->firstOfMonth()->format('Y-m-d');
    // }

    // public function getCutoffEndDate()
    // {
    //     return Carbon::now()->firstOfMonth()->addDays(14)->format('Y-m-d');
    // }
    public $payslips;

    public function render()
    {
        $employees = User::all();

        return view('livewire.generate-payroll', [
            'employees' => $employees,
        ]);
    }

    public function generatePayslips()
    {
        $employee = User::findOrFail($this->employeeId);

        $cutoffStartDate = $this->getCutoffStartDate();
        $cutoffEndDate = $this->getCutoffEndDate();

        $payrollList = payrollList::where('cutoff_from', $cutoffStartDate)
            ->where('cutoff_to', $cutoffEndDate)
            ->get();

        if ($payrollList->isNotEmpty()) {
            $this->payslips = $payrollList->map(function ($payroll) {
                return [
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
            return;
        }

        // Retrieve the attendance records for the employee
        $attendanceRecords = Attendance::where('user_id', $employee->id)
            ->whereBetween('check_in', [$cutoffStartDate, $cutoffEndDate])
            ->get();

        // Calculate payslip details
        $presentDaysTotal = $attendanceRecords->count();
        $regularHoursTotal = $attendanceRecords->sum(function ($record) {
            $formatted_in = Carbon::parse($record->check_in);
            $formatted_out = Carbon::parse($record->check_out);
            return $formatted_out->diffInHours($formatted_in);
        });

        // Perform additional calculations based on the salary types model
        $salaryTypes = SalaryTypes::where('name', $employee->employee_status)->get(); // Assuming you have only one record in the salary types table
        $grossPay = $regularHoursTotal * $employee->salary_rate;
        $deductions = $this->calculateDeductions($salaryTypes[0]);
        $allowance = $salaryTypes[0]->allowance;
        $netPay = $grossPay - $deductions + $allowance;

        // Create payrollList record
        $payrollList = payrollList::create([
            'user_id' => $employee->id,
            'cutoff_from' => $cutoffStartDate,
            'cutoff_to' => $cutoffEndDate,
            'present_days_total' => $presentDaysTotal,
            'regular_hours_total' => $regularHoursTotal,
            'gross_pay' => $grossPay,
            'deductions' => $deductions,
            'allowance' => $allowance,
            'net_pay' => $netPay,
        ]);

        // Store the generated payslip details for display
        $this->payslips = [
            [
                'cutoff_from' => $cutoffStartDate,
                'cutoff_to' => $cutoffEndDate,
                'employee_name' => $employee->first_name . ' ' . $employee->last_name,
                'present_days_total' => $presentDaysTotal,
                'regular_hours_total' => $regularHoursTotal,
                'gross_pay' => $grossPay,
                'deductions' => $deductions,
                'allowance' => $allowance,
                'net_pay' => $netPay,
            ]
        ];

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
        $employee = User::findOrFail($this->employeeId);

        $cutoffStartDate = $this->getCutoffStartDate2nd();
        $cutoffEndDate = $this->getCutoffEndDate2nd();

        $payrollList = payrollList::where('cutoff_from', $cutoffStartDate)
            ->where('cutoff_to', $cutoffEndDate)
            ->get();

        if ($payrollList->isNotEmpty()) {
            $this->payslips = $payrollList->map(function ($payroll) {
                return [
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
            return;
        }

        // Retrieve the attendance records for the employee
        $attendanceRecords = Attendance::where('user_id', $employee->id)
            ->whereBetween('check_in', [$cutoffStartDate, $cutoffEndDate])
            ->get();

        // Calculate payslip details
        $presentDaysTotal = $attendanceRecords->count();
        $regularHoursTotal = $attendanceRecords->sum(function ($record) {
            $formatted_in = Carbon::parse($record->check_in);
            $formatted_out = Carbon::parse($record->check_out);
            return $formatted_out->diffInHours($formatted_in);
        });

        // Perform additional calculations based on the salary types model
        $salaryTypes = SalaryTypes::where('name', $employee->employee_status)->get(); // Assuming you have only one record in the salary types table
        $grossPay = $regularHoursTotal * $employee->salary_rate;
        $deductions = $this->calculateDeductions2nd($salaryTypes[0]);
        $allowance = $salaryTypes[0]->allowance;
        $netPay = $grossPay - $deductions + $allowance;

        // Create payrollList record
        $payrollList = payrollList::create([
            'user_id' => $employee->id,
            'cutoff_from' => $cutoffStartDate,
            'cutoff_to' => $cutoffEndDate,
            'present_days_total' => $presentDaysTotal,
            'regular_hours_total' => $regularHoursTotal,
            'gross_pay' => $grossPay,
            'deductions' => $deductions,
            'allowance' => $allowance,
            'net_pay' => $netPay,
        ]);

        // Store the generated payslip details for display
        $this->payslips = [
            [
                'cutoff_from' => $cutoffStartDate,
                'cutoff_to' => $cutoffEndDate,
                'employee_name' => $employee->first_name . ' ' . $employee->last_name,
                'present_days_total' => $presentDaysTotal,
                'regular_hours_total' => $regularHoursTotal,
                'gross_pay' => $grossPay,
                'deductions' => $deductions,
                'allowance' => $allowance,
                'net_pay' => $netPay,
            ]
        ];

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
}