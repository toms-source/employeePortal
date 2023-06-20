<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditEmployee extends Component
{
    public $employee_numberE;
    public $last_nameE;
    public $first_nameE;
    public $officeE;
    public $departmentE;
    public $employee_statusE;
    public $emailE;
    public $passwordE;
    public $roleE = "user";
    public $idEdit;
    public $errora;


    protected $listeners = ['editEmployeez' => 'editEmployeez'];

    public function editEmployeez($id){
        $this->idEdit = $id;
        $this->mount();
    }

    public function mount()
    {
        $data = User::find($this->idEdit);

        if ($data) {
            $this->employee_numberE = $data->employee_number;
            $this->last_nameE = $data->last_name;
            $this->first_nameE = $data->first_name;
            $this->officeE = $data->office;
            $this->departmentE = $data->department;
            $this->employee_statusE = $data->employee_status;
            $this->emailE = $data->email;
            $this->passwordE = $data->password;
        }
    }

    public function saveE()
    {
        try {
            $this->validate([
                'employee_numberE' => [
                    'required',
                    Rule::unique('users', 'employee_number')->ignore($this->idEdit),
                ],
                'last_nameE' => 'required',
                'first_nameE' => 'required',
                'officeE' => 'required',
                'departmentE' => 'required',
                'employee_statusE' => 'required',
                'emailE' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($this->idEdit),
                ],
                'passwordE' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->getMessageBag();

            $errorMessage = '';
            foreach ($errors->all() as $message) {
                $errorMessage .= $message . ' ';
            }
            $this->errora = $errorMessage;
            // dd($errorMessage);

            // session()->flash('message', ''.$errorMessage);
            
            return;
        }

        $userData = User::find($this->idEdit);

        if (!$userData) {
            // Handle the case where the ordinance is not found
            return;
        }

        $userData->employee_number =  $this->employee_numberE;
        $userData->last_name = $this->last_nameE;
        $userData->first_name = $this->first_nameE;
        $userData->office = $this->officeE;
        $userData->department = $this->departmentE;
        $userData->employee_status = $this->employee_statusE;
        $userData->email = $this->emailE;
        $userData->password =   $this->passwordE;
        
        $userData->save();

        $this->reset([
            'employee_numberE',
            'last_nameE',
            'first_nameE',
            'officeE',
            'departmentE',
            'employee_statusE',
            'emailE',
            'passwordE',
        ]);

        $this->emit('employeeEdited');
    }

    public function render()
    {
        return view('livewire.edit-employee');
    }
}
