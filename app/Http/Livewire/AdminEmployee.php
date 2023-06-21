<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminEmployee extends Component
{
    public $idDelete;
    public $confirmDeleteModal = false;

    public function render()
    {
        $employees = User::all();
        return view('livewire.admin-employee', compact('employees'));
    }

    public function deleteEmpTry($id)
    {
        $this->idDelete = $id;
        $this->confirmDeleteModal = true;
    }

    public function deleteEmpConfirm()
    {
        User::find($this->idDelete)->delete();
        $this->confirmDeleteModal = false;
    }

    public function editEmployees($id)
    {
        $this->emit('editEmployeez', $id);
    }
}
