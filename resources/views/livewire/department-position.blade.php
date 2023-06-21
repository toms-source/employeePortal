<div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile">
        <div class="mb-3">
            <label for="department_id" class="form-label">Department</label>
            <select class="form-control" id="department_id" wire:model="department_id">
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="department_position" class="form-label">Position</label>
            <input type="text" class="form-control" id="department_position" wire:model="department_position">
        </div>

        <div class="mb-3">
            <label for="department_status" class="form-label">Status</label>
            <input type="text" class="form-control" id="department_status" wire:model="department_status">
        </div>

        <div class="mb-3">
            <label for="department_desc" class="form-label">Description</label>
            <textarea class="form-control" id="department_desc" wire:model="department_desc"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Position Profile</button>
    </form>
</div>

<div class="card">
    <div class="card-body">
        <div class="card-title">      <h3>Department Positions</h3></div>
  
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->department_position }}</td>
                        <td>{{ $department->department_status }}</td>
                        <td>{{ $department->department_desc }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
