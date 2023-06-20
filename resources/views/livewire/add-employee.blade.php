<div>
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h3> Add Employee Form </h3></div>
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
                <label for="middle_name" class="form-label">Middle Name</label>
                <input wire:model="middle_name" type="text" name="middle_name" class="form-control" required>
                @error('middle_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="gender" class="form-label"> Gender</label>
                <input wire:model="gender" type="text" name="gender" class="form-control" required>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="birth_date" class="form-label"> Date of Birth</label>
                <input wire:model="birth_date" type="date" name="birth_date" class="form-control" required>
                @error('birth_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="civil_status" class="form-label"> Civil Status</label>
                <input wire:model="civil_status" type="text" name="civil_status" class="form-control" required>
                @error('civil_status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
    
            <div class="mb-1 ml-3 mr-3">
                <label for="number" class="form-label">Cellphone Nuumber</label>
                <input wire:model="number" type="number" name="number" class="form-control" required>
                @error('number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="address" class="form-label">Address</label>
                <input wire:model="address" type="text" name="address" class="form-control" required>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="tin" class="form-label"> TIN</label>
                <input wire:model="tin" type="number" name="tin" class="form-control" required>
                @error('tin')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="sss" class="form-label"> SSS</label>
                <input wire:model="sss" type="number" name="sss" class="form-control" required>
                @error('sss')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="philhealth" class="form-label"> Philhealth</label>
                <input wire:model="philhealth" type="number" name="philhealth" class="form-control" required>
                @error('philhealth')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="pagibig" class="form-label"> Pag ibig</label>
                <input wire:model="pagibig" type="number" name="pagibig" class="form-control" required>
                @error('pagibig')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="contact_name" class="form-label">Contact Person Name</label>
                <input wire:model="contact_name" type="text" name="contact_name" class="form-control" required>
                @error('contact_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="contact_number" class="form-label">Contact Person Number</label>
                <input wire:model="contact_number" type="number" name="contact_number" class="form-control" required>
                @error('contact_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="contact_relationship" class="form-label">Contact Person Relationshoip</label>
                <input wire:model="contact_relationship" type="text" name="contact_relationship" class="form-control" required>
                @error('contact_relationship')
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

            <div class="mb-1 ml-3 mr-3">
                <label for="position" class="form-label">Position</label>
                <input wire:model="position" type="text" name="position" class="form-control" required>
                @error('position')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="mb-1 ml-3 mr-3">
                <label for="description" class="form-label">Description</label>
                <input wire:model="description" type="text" name="description" class="form-control" required>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="salary_rate" class="form-label">Salary Rate</label>
                <input wire:model="salary_rate" type="number" name="salary_rate" class="form-control" required>
                @error('salary_rate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="status" class="form-label">Status</label>
                <input wire:model="status" type="text" name="status" class="form-control" required>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-1 ml-3 mr-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input wire:model="start_date" type="date" name="start_date" class="form-control" required>
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-1 ml-3 mr-3">
                <label for="end_date" class="form-label">End Date</label>
                <input wire:model="end_date" type="date" name="end_date" class="form-control" required>
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="mb-3 ml-3 mr-3">
                <label for="password" class="form-label">Password</label>
                <input wire:model="password" type="password" name="password" class="form-control" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 ml-3 mr-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input wire:model="confirm_password" type="password" name="confirm_password" class="form-control" required>
                @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <!-- Add more input fields as needed -->
    
            <button type="submit" class="btn btn-primary ml-3">Add Employee</button>
        </form>
        </div>
    </div>

    {{-- <div class="card mt-3">
        <div class="card-body">
            <div class="card-title"><h3> Add Employee Table</h3></div>
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
                        @if($employee->id == 1)
                            @continue
                        @endif
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
                                <a><i class="fa-solid fa-trash-can"style="color: #e61919;" wire:click="deleteEmpTry({{$employee->id}})"></i></a>
                            </td>
        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
  
        
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
</script> --}}