<div>
    @if (session()->has('message'))
        <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form wire:submit.prevent="addEmployee" method="POST">
        @csrf

        <div class="mb-1 ml-3 mr-3">
            <label for="employee_number" class="form-label mt-3">Employee Number</label>
            <input wire:model="employee_number" type="text" name="employee_number" class="form-control" required>
            @error('employee_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-1 ml-3 mr-3">
            <label for="email" class="form-label mt-3">Email</label>
            <input wire:model="email" type="text" name="email" class="form-control" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-1 ml-3 mr-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input wire:model="last_name" type="text" name="last_name" class="form-control" required>
            @error('last_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-1 ml-3 mr-3">
            <label for="first_name" class="form-label">First Name</label>
            <input wire:model="first_name" type="text" name="first_name" class="form-control" required>
            @error('first_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-1 ml-3 mr-3">
            <label for="office" class="form-label">Office</label>
            <input wire:model="office" type="text" name="office" class="form-control" required>
            @error('office')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-1 ml-3 mr-3">
            <label for="department" class="form-label">Department</label>
            <input wire:model="department" type="text" name="department" class="form-control" required>
            @error('department')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 ml-3 mr-3">
            <label for="employee_status" class="form-label">Employee Status</label>
            <input wire:model="employee_status" type="text" name="employee_status" class="form-control" required>
            @error('employee_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 ml-3 mr-3">
            <label for="password" class="form-label">Password</label>
            <input wire:model="password" type="password" name="employee_status" class="form-control" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Add more input fields as needed -->

        <button type="submit" class="btn btn-primary ml-3">Add Employee</button>
    </form>
    
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Office</th>
                    <th>Department</th>
                    <th>Employee Status</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->employee_number }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->office }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->employee_status }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <button class="fa fa-edit border-0" data-target="#editEmployee" type="button" data-toggle="modal" wire:click="editEmployees({{ $employee->id }})"></button>
                        @if($employee->id == 1)
                                </td>

                            </tr>
                            @continue
                        @endif
                        <a><i class="fa-solid fa-trash-can"style="color: #e61919;" wire:click="deleteEmpTry({{$employee->id}})"></i></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <div class="modal fade" id="deleteEmployee" tabindex="-1" role="dialog"
    aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordinanceAddedModalLabel">Employee Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Employee?
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-5 btn btn-outline-danger" data-dismiss="modal" wire:click='deleteEmpConfirm()'>Yes</button>
                    <button type="button" class="px-5 btn btn-outline-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('deleteEmployee',() =>{
            console.log('ordinanceAdded event received');

            // document.getElementById('ordinanceDelete').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'deleteEmployee'));
            modalOrdinanceAdded.show();
        });
    });
</script>