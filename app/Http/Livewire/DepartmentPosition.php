<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Departments;

class DepartmentPosition extends Component
{

    public $departments;
    public $department_id;
    public $department_position;
    public $department_status;
    public $department_desc;

    public function mount()
    {
        $this->departments = Departments::all();
    }

    public function updateProfile()
    {
        $this->validate([
            'department_id' => 'required|exists:departments,id',
            'department_position' => 'nullable|string',
            'department_status' => 'nullable|string',
            'department_desc' => 'nullable|string',
        ]);

        $department = Departments::find($this->department_id);

        $department->update([
            'department_position' => $this->department_position,
            'department_status' => $this->department_status,
            'department_desc' => $this->department_desc,
        ]);

        $this->reset(['department_id', 'department_position', 'department_status', 'department_desc']);

        session()->flash('message', 'Position Profile successfully updated.');
    }
    public function render()
    {
        return view('livewire.department-position');
    }
}
