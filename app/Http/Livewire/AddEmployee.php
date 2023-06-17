<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\EmployeeAdded;
use Illuminate\Support\Facades\Mail;

class AddEmployee extends Component
{
    public $employee_number;
    public $last_name;
    public $first_name;
    public $office;
    public $department;
    public $employee_status;
    public $email;
    public $password;


    public function render()
    {
        $employees = User::all();
        return view('livewire.add-employee', compact('employees'));
    }

    public function addEmployee()
    {
        $validatedData = $this->validate([
            'employee_number' => 'required|unique:users,employee_number',
            'last_name' => 'required',
            'first_name' => 'required',
            'office' => 'required',
            'department' => 'required',
            'employee_status' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        User::create($validatedData);
        Mail::to($this->email)->send(new EmployeeAdded($this->password));

        $this->reset([
            'employee_number',
            'last_name',
            'first_name',
            'office',
            'department',
            'employee_status',
            'email',
            'password',
        ]);

        session()->flash('message', 'Employee added successfully.');
    }
}
