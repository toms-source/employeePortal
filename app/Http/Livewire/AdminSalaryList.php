<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\salaryTypes;

class AdminSalaryList extends Component
{

    public $nameS;
    public $descriptionS;
    public $daily_rateS;
    public $hourly_rateS;
    public $tax_birS;
    public $tax_sssS;
    public $tax_phealthS;
    public $tax_pibigS;
    public $ot_rateS;
    public $allowanceS;
    public $idDelete;

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

    protected $listeners = ['employeeEdited' => 'refresh'];

    public function refresh(){
        $this->render();
    }

    public function addSalary()
    {
        $validatedData = $this->validate([
            'nameS' => 'required',
            'descriptionS' => 'required',
            'daily_rateS' => 'required',
            'hourly_rateS' => 'required',
            'tax_birS' => 'required',
            'tax_sssS' => 'required',
            'tax_phealthS' => 'required',
            'tax_pibigS' => 'required',
            'ot_rateS' => 'required',
            'allowanceS' => 'required',
        ]);
        salaryTypes::create([
            'name' => $this->nameS,
            'description'=> $this->descriptionS,
            'daily_rate'=> $this->daily_rateS,
            'hourly_rate'=> $this->hourly_rateS,
            'tax_bir'=> $this->tax_birS,
            'tax_sss'=> $this->tax_sssS,
            'tax_phealth' => $this->tax_phealthS,
            'tax_pibig'=> $this->tax_pibigS,
            'ot_rate'=> $this->ot_rateS,
            'allowance' => $this->allowanceS,
        ]);
        // salaryTypes::create($validatedData);

        $this->reset([
            'nameS',
            'descriptionS',
            'daily_rateS',
            'hourly_rateS',
            'tax_birS',
            'tax_sssS',
            'tax_phealthS' ,
            'tax_pibigS',
            'ot_rateS',
            'allowanceS' ,
        ]);

        session()->flash('message', 'Employee added successfully.');
    }
    public function render()
    {
        
        $salaryTypes = salaryTypes::all();
        return view('livewire.admin-salary-list', compact('salaryTypes'));
    }


    public function deleteEmpTry($id){
        $this->idDelete = $id;
        $this->emit('deleteEmployee');
    }

    public function deleteEmpConfirm(){
        $query = salaryTypes::query();

        $id = '%' . $this->idDelete . '%';
        $query  = salaryTypes::where('id', 'like', $id)->delete();
        
        $this->render();
    }

    public function editEmployees($id){
        $this->emit('editSalary', $id);
    }
    
}
