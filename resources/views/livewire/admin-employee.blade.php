<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-">
                                <div class="mb-3">
                                    <form class="d-flex">
                                        <input class="form-control me-2" type="search" placeholder="Search"
                                            aria-label="Search">
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

                </div>
            </div>
        </div>
    </div>
</div>
