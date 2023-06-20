<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\salaryTypes;

class AdminSalaryEdit extends Component
{
    public $nameSE;
    public $descriptionSE;
    public $daily_rateSE;
    public $hourly_rateSE;
    public $tax_birSE;
    public $tax_sssSE;
    public $tax_phealthSE;
    public $tax_pibigSE;
    public $ot_rateSE;
    public $allowanceSE;
    public $idEdit;
    protected $listeners = ['editSalary' => 'editEmployeez'];

    
    public function editEmployeez($id){
        $this->idEdit = $id;
        $this->mount();
    }

    
    public function mount()
    {
        $data = salaryTypes::find($this->idEdit);

        if ($data) {
            $this->nameSE =  $data->name;
            $this->descriptionSE = $data->description;
            $this->daily_rateSE = $data->daily_rate;
            $this->hourly_rateSE = $data->hourly_rate;
            $this->tax_birSE = $data->tax_bir;
            $this->tax_sssSE = $data->tax_sss;
            $this->tax_phealthSE = $data->tax_phealth;
            $this->tax_pibigSE =   $data->tax_pibig;
            $this->ot_rateSE = $data->ot_rate;
            $this->allowanceSE =   $data->allowance;
        
        }
    }
    public function saveE()
    {
        // $this->validate([
        //     'nameSE' => 'required',
        //     'descriptionSE' => 'required',
        //     'daily_rateSE' => 'required',
        //     'hourly_rateSE' => 'required',
        //     'tax_birSE' => 'required',
        //     'tax_sssSE' => 'required',
        //     'tax_phealthSE' => 'required',
        //     'tax_pibigSE' => 'required',
        //     'ot_rateSE' => 'required',
        //     'allowanceSE' => 'required',
        // ]);

        $userData = salaryTypes::find($this->idEdit);

        if (!$userData) {
            // Handle the case where the ordinance is not found
            return;
        }

        $userData->name =  $this->nameSE;
        $userData->description = $this->descriptionSE;
        $userData->daily_rate = $this->daily_rateSE;
        $userData->hourly_rate = $this->hourly_rateSE;
        $userData->tax_bir = $this->tax_birSE;
        $userData->tax_sss = $this->tax_sssSE;
        $userData->tax_phealth = $this->tax_phealthSE;
        $userData->tax_pibig =   $this->tax_pibigSE;
        $userData->ot_rate = $this->ot_rateSE;
        $userData->allowance =   $this->allowanceSE;
        
        $userData->save();

        $this->emit('employeeEdited');
    }
    public function render()
    {
        return view('livewire.admin-salary-edit');
    }
}
