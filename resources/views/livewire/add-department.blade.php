<div class="">

    @if ($editingDepartmentId)
        <!-- Modal -->
        <div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentModalLabel"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDepartmentModalLabel">Edit Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($editingDepartmentId)
                            <form wire:submit.prevent="saveChanges">
                                <div class="mb-3">
                                    <label for="editName" class="form-label">Department Name</label>
                                    <input type="text" class="form-control" id="editName" wire:model="editName">
                                </div>
                                <div class="mb-3">
                                    <label for="editManager" class="form-label">Manager</label>
                                    <select class="form-control" id="editManager" wire:model="editManager">
                                        <option value="">Select Manager</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name }}
                                                {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="editDescription" wire:model="editDescription"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @endif


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="deleteDepartmentModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDepartmentModalLabel">Delete Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this department?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteDepartment">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>Position Profile</h3>
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label for="name" class="form-label">Add Department</label>
                        <input type="text" class="form-control" id="name" wire:model="name"
                            placeholder="Department Name">
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Manager</label>
                        <select class="form-control" id="user_id" wire:model="user_id">
                            <option value="">Select Manager</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>

                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" wire:model="description" placeholder="Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Department</button>
                </form>

                @if (session()->has('message'))
                    <div class="alert alert-success mt-3">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">


            </div>
            <h3>Departments</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th>Manager</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->user->first_name }} {{ $department->user->last_name }}</td>
                            <td>{{ $department->description }}</td>
                            <td>
                                <button class="fa fa-edit border-0"
                                    wire:click="editDepartment({{ $department->id }})"></button>
                                <a wire:click="confirmDelete({{ $department->id }})"><i class="fa-solid fa-trash-can"
                                        style="color: #e61919;"></i></a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="card mt-3">
    <div class="card-body">
        <div class="card-title">
            <h3>Position Profile</h3>

        </div>
        @livewire('department-position')
    </div>
</div>







</div>
<script>
    window.addEventListener('show-modal', event => {
        $(event.detail).modal('show');
    });

    window.addEventListener('hide-modal', event => {
        $(event.detail).modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });
</script>
<script>
    window.addEventListener('show-delete-modal', () => {
        $('#deleteDepartmentModal').modal('show');
    });

    window.addEventListener('hide-delete-modal', () => {
        $('#deleteDepartmentModal').modal('hide');
    });
</script>
