<div>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    
        @foreach($leaveRequests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->user_id }}</td>
                <td>{{ $request->start_date }}</td>
                <td>{{ $request->end_date }}</td>
                <td>{{ $request->reason }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    @if ($request->status == 'Pending')
                        <button wire:click="approve({{ $request->id }})">Approve</button>
                        <button wire:click="deny({{ $request->id }})">Deny</button>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    
</div>
