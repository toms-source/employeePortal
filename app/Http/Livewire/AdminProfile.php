<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;


class AdminProfile extends Component
{
    use WithFileUploads;

    public $email;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $department;
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
    public $disable = true;
    public $profile_picture;

    public function setOff()
    {
        $this->disable = false;
    }
    public function setOn()
    {
        $this()->validate;
        $this->disable = true;
    }

    

    protected $rules = [
        'last_name' => 'required',
        'middle_name' => 'required',
        'first_name' => 'required',
        'department' => 'required',
        'status' => 'required',
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
        // 'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    ];

    public function mount()
    {
        

        $data = User::find( Auth::user()->id);

        $this->email = $data->email;
        $this->last_name = $data->last_name;
        $this->first_name = $data->first_name;
        $this->middle_name = $data->middle_name;
        $this->department = $data->department;
        $this->gender = $data->gender;
        $this->birth_date = $data->birth_date;
        $this->civil_status = $data->civil_status;
        $this->number = $data->number;
        $this->address = $data->address;
        $this->sss = $data->sss;
        $this->tin = $data->tin;
        $this->philhealth = $data->philhealth;
        $this->pagibig = $data->pagibig;
        $this->contact_name = $data->contact_name;
        $this->contact_number = $data->contact_number;
        $this->contact_relationship = $data->contact_relationship;
        $this->position = $data->position;
        $this->description = $data->description;
        $this->salary_rate = $data->salary_rate;
        $this->status = $data->status;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
        $this->profile_picture = $data->profile_picture;
    }

    public function render()
    {
        return view('livewire.admin-profile');
    }
}
