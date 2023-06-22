<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminEmployee extends Component
{
    public $idDelete;
    public $confirmDeleteModal = false;
    public $selectedEmployeeId;
    public $searchTerm;


    public function render()
    {
        $employees = User::where(function ($query) {
            $query->where('last_name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('first_name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('position', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('department', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('middle_name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('status', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('role', 'like', '%' . $this->searchTerm . '%');
        })->get();
        return view('livewire.admin-employee', compact('employees'));
    }

    public function deleteEmpTry($id)
    {
        $this->idDelete = $id;
        $this->emit('deleteEmployee');
    }

    public function editEmployees($id)
    {
        $id = $id;
        return redirect()->to(route('admin.employee.edit') . '?id=' . $id);
    }


    public function deleteEmpConfirm()
    {
        User::find($this->idDelete)->delete();
        $this->confirmDeleteModal = false;
        $this->render();
    }
}
