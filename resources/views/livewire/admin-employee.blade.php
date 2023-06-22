<div>

<!-- Employee Table -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session()->has('message1'))
            <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message1') }}
                <button wire:model="profile_picture" type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="mb-3">
                <form class="d-flex">
                    <input wire:model="searchTerm" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Start Date</th>
                        <th>Status</th>
                        <th>Rate</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        @if ($employee->id == 1)
                            @continue
                        @endif
                        <tr>
                            <td>{{ $employee->first_name }} {{ $employee->middle_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->start_date }}</td>
                            <td>{{ $employee->status }}</td>
                            <td>{{ $employee->salary_rate }}</td>
                            <td>
                                <button class="fa fa-edit border-0" data-target="#editEmployee" type="button" wire:click="editEmployees({{ $employee->id }})"></button>
                                <a><i class="fa-solid fa-trash-can" style="color: #e61919;" wire:click="deleteEmpTry({{ $employee->id }})"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEmployeeModalLabel">Employee Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this employee?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="deleteEmpConfirm" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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
                'deleteEmployeeModal'));
            modalOrdinanceAdded.show();
        });
    });
</script>