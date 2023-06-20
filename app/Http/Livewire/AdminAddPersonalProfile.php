<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminAddPersonalProfile extends Component
{
    public $email;
    public $password;
    public $employee_number;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $department;
    public $employee_status;
    public $role;
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
    public $profile_picture;
    public $confirm_password;

    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|same:confirm_password',
        'confirm_password' => 'required',
        'employee_number' => 'required|unique:users,employee_number',
        'last_name' => 'required',
        'first_name' => 'required',
        'middle_name' => 'required',
        'department' => 'required',
        'employee_status' => 'required',
        'role' => 'required',
        'gender' => 'required',
        'birth_date' => 'required|date',
        'civil_status' => 'required',
        'number' => 'required|min:10',
        'address' => 'required',
        'sss' => 'required',
        'tin' => 'required',
        'philhealth' => 'required',
        'pagibig' => 'required',
        'contact_name' => 'required',
        'contact_number' => 'required',
        'contact_relationship' => 'required',
        'position' => 'required',
        'description' => 'min:5',
        'salary_rate' => 'required',
        'status' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'date',
        'profile_picture' => 'required|image',
    ];

    public function store()
    {
        $validatedData = $this->validate($this->rules);

        User::create($validatedData);

        // Reset the form fields
        $this->reset();

        // Redirect or display success message
        // return redirect()->back()->with('success', 'User created successfully');
    }

    public function render()
    {
        return view('livewire.admin-add-personal-profile');
    }
}
