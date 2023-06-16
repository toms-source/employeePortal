<div>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Amount</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    
        @foreach($loanRequests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->user_id }}</td>
                <td>{{ $request->amount }}</td>
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
