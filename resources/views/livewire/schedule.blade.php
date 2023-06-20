<div>
    <div>
        <table class="table">
            <thead>
                <tr>
               
                    <th>Last</th>
                    <th>First</th>
                    <th>Middle</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->middle_name }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->employee_status }}</td>
                    <td>
                        <a href="{{ route('employee-calendar', $employee->id) }}"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
