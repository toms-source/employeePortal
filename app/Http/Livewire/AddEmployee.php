<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class AddEmployee extends Component
{
    public $employee_number;
    public $last_name;
    public $first_name;
    public $office;
    public $department;
    public $employee_status;
    public $email;

    public function render()
    {
        $employees = Employee::all();
        return view('livewire.add-employee',compact('employees'));
    }

    public function addEmployee()
    {
        $validatedData = $this->validate([
            'employee_number' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'office' => 'required',
            'department' => 'required',
            'employee_status' => 'required',
            'email' => 'required|email|unique:employees,email',
        ]);

        Employee::create($validatedData);

        // Reset form fields after saving
        $this->reset([
            'employee_number',
            'last_name',
            'first_name',
            'office',
            'department',
            'employee_status',
            'email',
        ]);

        session()->flash('message', 'Employee added successfully.');
    }
}
