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
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
