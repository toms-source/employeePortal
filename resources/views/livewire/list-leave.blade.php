<div>
    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leave as $leaves)
                    <tr class="text-center">
        
                        <td>{{ $leaves->reason }}</td>
                        <td>{{ $leaves->status }}</td>
                        <td>{{ $leaves->start_date }}</td>
                        <td>{{ $leaves->end_date }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $leave->links('pagination::bootstrap-5') }}</div>
        
    </div>
 

</div>