<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Mail\EmployeeAdded;
use App\Models\Departments;
use App\Models\salaryTypes;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class AdminAddPersonalProfile extends Component
{
    use WithFileUploads;

    public $email;
    public $company_email;
    public $password;
    public $confirm_password;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $department;
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

    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'company_email' => 'required|email|unique:users,company_email',
        'password' => 'required|same:confirm_password',
        'confirm_password' => 'required',
        'last_name' => 'required',
        'middle_name' => 'required',
        'first_name' => 'required',
        'department' => 'nullable',
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
        'end_date' => 'nullable',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    ];

    public function store()
    {
        $this->validate();
        $profilePicturePath="";
        if($this->profile_picture)
        {
            $profilePicturePath = $this->profile_picture->store('profile_pictures', 'public'); 
        }
        

        $user = User::create([
            'email' => $this->email,
            'company_email' => $this->company_email,
            'password'=> $this->password,
            'last_name'=> $this->last_name,
            'first_name'=> $this->first_name,
            'middle_name'=> $this->middle_name,
            'department'=> $this->department,
            'role'=> $this->role,
            'gender'=> $this->gender,
            'birth_date'=> $this->birth_date,
            'civil_status'=> $this->civil_status,
            'number'=> $this->number,
            'address'=> $this->address,
            'sss'=> $this->sss,
            'tin'=> $this->tin,
            'philhealth'=> $this->philhealth,
            'pagibig'=> $this->pagibig,
            'contact_name'=> $this->contact_name,
            'contact_number'=> $this->contact_number,
            'contact_relationship'=> $this->contact_relationship,
            'position'=> $this->position,
            'description'=> $this->description,
            'salary_rate'=> $this->salary_rate,
            'status'=> $this->status,
            'start_date'=> $this->start_date,
            'end_date'=> $this->end_date,
            'profile_picture' => $profilePicturePath,
        ]);

        event(new Registered($user));
        Mail::to($this->email)->send(new EmployeeAdded($this->password));
        session()->flash('message', 'Employee added successfully.');
        //return redirect(route('admin.employee.list'))->with('message2', 'Employee add successfully.');
    }

    public function render()
    {
        $departments = Departments::get();
        $rate = salaryTypes::get();
        return view('livewire.admin-add-personal-profile', compact('departments','rate'));
    }
}
