<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Departments;
use App\Models\User;

class AddDepartment extends Component
{
    public $name;
    public $user_id;  // add this line
    public $description;
    public $departments;
    public $users;  // if you need to populate the user drop-down
    public $department_id;
    public $department_position;
    public $department_status;
    public $department_desc;
    public $editingDepartmentId = null;
    public $editName = null;
    public $editManager = null;
    public $editDescription = null;

    public $departmentToDelete;
    public function mount()
    {
        $this->departments = Departments::all();
        $this->users = User::all(); // fetch all users
    }
    public function deleteDepartment()
    {
        $department = Departments::find($this->departmentToDelete);
        $department->delete();
    
        // refresh the list
        $this->departments = Departments::all();
        $this->dispatchBrowserEvent('hide-delete-modal');
        session()->flash('message', 'Department successfully deleted.');
    }
    
    public function confirmDelete($id)
    {
        $this->departmentToDelete = $id; 
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    

    public function closeModal()
    {
        $this->reset(['editingDepartmentId', 'editName', 'editManager', 'editDescription']);
        $this->dispatchBrowserEvent('hide-modal', '#editDepartmentModal');
    }
    public function editDepartment($departmentId)
    {
        $department = Departments::find($departmentId);

        $this->editingDepartmentId = $department->id;
        $this->editName = $department->name;
        $this->editManager = $department->user_id;
        $this->editDescription = $department->description;

        $this->dispatchBrowserEvent('show-modal', '#editDepartmentModal');
    }
    public function save()
    {
        $this->validate([
            'name' => 'required',
            'user_id' => 'required',
            'description' => 'required',
        ]);

        if ($this->department_id) {
            $department = Departments::find($this->department_id);
            $department->update([
                'name' => $this->name,
                'user_id' => $this->user_id,
                'description' => $this->description,
            ]);
            session()->flash('message', 'Department successfully updated.');
        } else {
            Departments::create([
                'name' => $this->name,
                'user_id' => $this->user_id,
                'description' => $this->description,
            ]);
            session()->flash('message', 'Department successfully created.');
        }

        $this->departments = Departments::all();

        $this->reset(['name', 'user_id', 'description', 'department_id']);
    }
    public function saveChanges()
    {
        $this->validate([
            'editName' => 'required|string',
            'editManager' => 'required|exists:users,id',
            'editDescription' => 'nullable|string',
        ]);

        $department = Departments::find($this->editingDepartmentId);

        $department->update([
            'name' => $this->editName,
            'user_id' => $this->editManager,
            'description' => $this->editDescription,
        ]);

        $this->reset(['editingDepartmentId', 'editName', 'editManager', 'editDescription']);

        session()->flash('message', 'Department successfully updated.');

        // Refresh the list of departments
        $this->departments = Departments::all();

        $this->closeModal();
    }



    public function render()
    {
        $this->users = User::all();
        $this->departments = Departments::all();
        return view('livewire.add-department');
    }
}
