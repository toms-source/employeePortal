<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\payrollList;
use App\Models\salaryTypes;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditPayroll extends Component
{ 
    public $idEdit;
    
    public $hourly_rate;
    public $total_hours;
    public $ot_rate;
    public $allowance;
    public $tax_bir;
    public $tax_sss;
    public $tax_phealth;
    public $tax_pibig;
    public $total_hours_ot = 0;

    protected $listeners = ['editPayrollz' => 'editPayrollz'];

    public function editPayrollz($id){
        $this->idEdit = $id;
        $this->showForm();
    }

    public function showForm()
    {
        $data = payrollList::where('id', $this->idEdit)->get();
        $emp = User::findOrFail($data[0]->user_id);
        $data2 = salaryTypes::where('daily_rate', $emp->salary_rate)->get();

        if ($data) {
            $this->hourly_rate = $emp->salary_rate;
            $this->total_hours = $data[0]->regular_hours_total;
            $this->ot_rate = $data2[0]->ot_rate;
            $this->allowance = $data[0]->allowance;
            $this->tax_bir = $data2[0]->tax_bir;
            $this->tax_sss = $data2[0]->tax_sss;
            $this->tax_phealth = $data2[0]->tax_phealth;
            $this->tax_pibig = $data2[0]->tax_pibig;
        }
        
    }

    public function render()
    {
        return view('livewire.edit-payroll');
    }

    public function saveE()
    {
       
        try {
            $this->validate([ 
                'hourly_rate'=> 'required',
                'total_hours'=> 'required',
                'ot_rate'=> 'required',
                'allowance'=> 'required',
                'tax_bir'=> 'required',
                'tax_sss'=> 'required',
                'tax_phealth' => 'required',
                'tax_pibig'=> 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // $errors = $e->validator->getMessageBag();

            // $errorMessage = '';
            // foreach ($errors->all() as $message) {
            //     $errorMessage .= $message . ' ';
            // }
            // $this->errora = $errorMessage;
            // dd($errorMessage);

            // session()->flash('message', ''.$errorMessage);
            
            return;
        }
        $data = payrollList::find($this->idEdit);
        $emp = User::findOrFail($data->user_id);
        $data2 = salaryTypes::where('daily_rate', $emp->salary_rate)->get();
        if (!$data) {
            // Handle the case where the ordinance is not found
            return;
        }

        // $emp->daily_rate =  $this->hourly_rate;
        
        // $data->ot_rate = $this->ot_rate;
        
        // $data->tax_bir = $this->tax_bir;
        // $data->tax_sss = $this->tax_sss;
        // $data->tax_phealth = $this->tax_phealth;
        // $data->tax_pibig =   $this->tax_pibig;

        $overtimeAmount = $this->total_hours_ot * $this->ot_rate;
        $grossPay = $this->total_hours * $emp->salary_rate;
        $deductions = $this->calculateDeductions();
        $allowance = $this->allowance;
        $netPay = $grossPay + $overtimeAmount + $allowance  - $deductions;


        $data->regular_hours_total = $this->total_hours;
        $data->allowance = $this->allowance;
        $data->deductions = $deductions;
        $data->gross_pay = $grossPay+ $overtimeAmount;
        $data->net_pay = $netPay;
        
        $data->save();

        $this->reset([
            'hourly_rate',
            'total_hours',
            'ot_rate',
            'allowance',
            'tax_bir',
            'tax_sss',
            'tax_phealth' ,
            'tax_pibig',
        ]);

        $this->emit('payrollEdited');
    }

    
    private function calculateDeductions()
    {
        // Perform the calculation for deductions based on gross pay and salary type
        // Example calculation:
        
        // $data->tax_bir = $this->tax_bir;
        // $data->tax_sss = $this->tax_sss;
        // $data->tax_phealth = $this->tax_phealth;
        // $data->tax_pibig =   $this->tax_pibig;
        // $taxBIR = $salaryTypes->tax_bir;
        // $taxSSS = $salaryTypes->tax_sss;
        // $taxPhilHealth = $salaryTypes->tax_phealth;
        // $taxPagIBIG = $salaryTypes->tax_pibig;

        // Assuming the deductions are additive
        return $this->tax_bir + $this->tax_sss + $this->tax_phealth + $this->tax_pibig;
    }
}
