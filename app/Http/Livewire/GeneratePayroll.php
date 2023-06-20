<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\SalaryTypes;
use App\Models\payrollList;
use App\Models\User;

class GeneratePayroll extends Component
{
    public $payrollListId;

    public function generatePayslip()
    {
        $payrollList = payrollList::find($this->payrollListId);

        if (!$payrollList) {
            // Handle the case where the payroll list is not found
            return;
        }

        $attendance = Attendance::where('user_id', $payrollList->user_id)
            ->whereBetween('check_in', [$payrollList->cutoff_from, $payrollList->cutoff_to])
            ->whereNotNull('check_out')
            ->get();

        $salaryType = salaryTypes::where('name', $payrollList->user->salary_type)->first();

        if (!$salaryType) {
            // Handle the case where the salary type is not found
            return;
        }

        // Perform calculations and generate the payslip based on the data retrieved

        // Example calculations using the salary type:

        $presentDaysTotal = count($attendance);
        $regularHoursTotal = $this->calculateRegularHours($attendance);
        $grossPay = $this->calculateGrossPay($regularHoursTotal, $salaryType);
        $deductions = $this->calculateDeductions($grossPay, $salaryType);
        $allowance = $this->calculateAllowance($salaryType);
        $netPay = $this->calculateNetPay($grossPay, $deductions, $allowance);

        // Update the payroll list with the calculated values
        $payrollList->present_days_total = $presentDaysTotal;
        $payrollList->regular_hours_total = $regularHoursTotal;
        $payrollList->gross_pay = $grossPay;
        $payrollList->deductions = $deductions;
        $payrollList->allowance = $allowance;
        $payrollList->net_pay = $netPay;
        $payrollList->save();

        // Flash a success message to indicate that the payslip has been generated
        session()->flash('message', 'Payslip generated successfully.');
    }

    private function calculateRegularHours($attendance)
    {
        // Perform the calculation for regular hours based on attendance records
        // Example calculation:
        return count($attendance) * 8; // Assuming 8 hours per day
    }

    private function calculateGrossPay($regularHours, $salaryType)
    {
        // Perform the calculation for gross pay based on regular hours and salary type
        // Example calculation:
        return $regularHours * $salaryType->hourly_rate; // Assuming hourly rate is stored in the salary type
    }

    private function calculateDeductions($grossPay, $salaryType)
    {
        // Perform the calculation for deductions based on gross pay and salary type
        // Example calculation:
        $taxBIR = $grossPay * $salaryType->tax_bir;
        $taxSSS = $grossPay * $salaryType->tax_sss;
        $taxPhilHealth = $grossPay * $salaryType->tax_phealth;
        $taxPagIBIG = $grossPay * $salaryType->tax_pibig;

        // Assuming the deductions are additive
        return $taxBIR + $taxSSS + $taxPhilHealth + $taxPagIBIG;
    }

    private function calculateAllowance($salaryType)
    {
        // Perform the calculation for allowance based on salary type
        // Example calculation:
        return $salaryType->allowance;
    }

    private function calculateNetPay($grossPay, $deductions, $allowance)
    {
        // Perform the calculation for net pay based on gross pay, deductions, and allowance
        // Example calculation:
        return $grossPay - $deductions + $allowance;
    }

    public function render()
    {
        $payrollList = payrollList::all();
        $salaryTypes = salaryTypes::all();

        return view('livewire.generate-payroll', [
            'payrollList' => $payrollList,
            'salaryTypes' => $salaryTypes,
        ]);
    }
}
