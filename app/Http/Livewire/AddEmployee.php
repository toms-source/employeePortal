<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\EmployeeAdded;
use Illuminate\Support\Facades\Mail;

class AddEmployee extends Component
{
    public $email;
    public $company_email;
    public $password;
    public $confirm_password;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $department;
    public $role="employee";
    public $gender;
    public $birth_date;
    public $civil_status;
    public $number;
    public $address;
    public $sss;
    public $tin;
    public $philhealth;
    public $pagibig;
    public $contact_name;
    public $contact_number;
    public $contact_relationship;
    public $position;
    public $description;
    public $salary_rate;
    public $status;
    public $start_date;
    public $end_date;

    protected $listeners = ['employeeEdited' => 'render'];


    public function render()
    {
        $employees = User::all();
        return view('livewire.add-employee', compact('employees'));
    }

    public function addEmployee()
    {
        $this->company_email = $this->email;
        $validatedData = $this->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'first_name' => 'required',
            'department' => 'required',
            'status' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'civil_status' => 'required',
            'number' => 'required',
            'address' => 'required',
            'sss' => 'required',
            'tin' => 'required',
            'philhealth' => 'required',
            'pagibig' => 'required',
            'contact_name' => 'required',
            'contact_number' => 'required',
            'contact_relationship' => 'required',
            'position' => 'required',
            'description' => 'required',
            'salary_rate' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        User::create($validatedData);
        // Mail::to($this->email)->send(new EmployeeAdded($this->password));
    
        session()->flash('message', 'Employee added successfully.');
        
    }

    // public function deleteEmpTry($id){
    //     $this->idDelete = $id;
    //     $this->emit('deleteEmployee');
    // }

    // public function deleteEmpConfirm(){
    //     $query = User::query();

    //     $id = '%' . $this->idDelete . '%';
    //     $query  = User::where('id', 'like', $id)->delete();
        
    //     $this->render();
    // }

    // public function editEmployees($id){
    //     $this->emit('editEmployeez', $id);
    // }
}
