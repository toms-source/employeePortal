<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class AdminEmployeeEdit extends Component
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
    public $profile_picture;
    public $user_id;

    protected $rules = [
        // 'email' => 'required|email|unique:users,email,' . '$data->id',
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
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    ];

    public function mount(Request $request)
    {
        $this->user_id = $request->query('id');
        $data = User::find($this->user_id);
        
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
    }

    public function updateProfile(Request $request)
    {
        $data = User::find($this->user_id);
        $this->validate();
       
        $profilePicturePath = '';

        if($this->profile_picture)
        {
            $profilePicturePath = $this->profile_picture->store('profile_pictures', 'public');

            if(File::exists(public_path('storage/'.auth()->user()->profile_picture))){
                File::delete(public_path('storage/'.auth()->user()->profile_picture));
            }
            $data->profile_picture = $profilePicturePath;

        }

        // Update the properties of the user model
        // $data->email = $this->email;
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

        return redirect(route('admin.employee.list'))->with('message1', 'Employee edit successfully.');

    }

    public function render()
    {
        return view('livewire.admin-employee-edit');
    }
}
