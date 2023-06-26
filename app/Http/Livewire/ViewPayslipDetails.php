<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\payrollList;
use App\Models\User;

class ViewPayslipDetails extends Component
{
    public $employee;
    public $payslipRecord;
    public $salaryRecord;

    protected $listeners = ['payrollEdited' => '$refresh'];


    public function mount()
    {
        // $this->user = $employee;
        // $this->payslipRecord = payrollList::where('user_id', $user->id)->get();
        // $this->salaryRecord = salaryTypes::where('daily_rate', $user->salary_rate)->get();
    }

    public function editThis(){
        $this->emit('editPayrollz', $this->payslipRecord->id);

    }
    

    public function render()
    {
        
        return view('livewire.view-payslip-details', [
            'user' => $this->employee,
            'payslipRecord' => $this->payslipRecord,
            'salaryRecord' => $this->salaryRecord
        ]);
    }
}
