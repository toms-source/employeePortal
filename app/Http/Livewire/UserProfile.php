<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfile extends Component
{

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
        $this->disable = true;
    }

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

    public function updateProfile()
    {
        $data = User::find(Auth::user()->id);

        // Update the properties of the user model
        $data->email = $this->email;
        $data->last_name = $this->last_name;
        $data->first_name = $this->first_name;
        $data->middle_name = $this->middle_name;
        $data->department = $this->department;
        $data->gender = $this->gender;
        $data->birth_date = $this->birth_date;
        $data->civil_status = $this->civil_status;
        $data->number = $this->number;
        $data->address = $this->address;
        $data->sss = $this->sss;
        $data->tin = $this->tin;
        $data->philhealth = $this->philhealth;
        $data->pagibig = $this->pagibig;
        $data->contact_name = $this->contact_name;
        $data->contact_number = $this->contact_number;
        $data->contact_relationship = $this->contact_relationship;
        $data->position = $this->position;
        $data->description = $this->description;
        $data->salary_rate = $this->salary_rate;
        $data->status = $this->status;
        $data->start_date = $this->start_date;
        $data->end_date = $this->end_date;

        // Save the updated user model
        $data->save();

        session()->flash('message', 'Employee save successfully.');

    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
