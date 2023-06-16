<div>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Request Type</th>
            <th>Request Details</th>
            <th>Status</th>
            <th>Answer</th>
            <th>Actions</th>
        </tr>
    
        @foreach($otherRequests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->user_id }}</td>
                <td>{{ $request->request_type }}</td>
                <td>{{ $request->request_details }}</td>
                <td>{{ $request->status }}</td>
                <td>{{ $request->answer }}</td>
                <td>
                    @if ($request->status == 'Pending')
                        <button wire:click="selectRequest({{ $request->id }})">Approve</button>
                        <button wire:click="rejectRequest({{ $request->id }})">Reject</button>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    
    @if($selectedRequest)
        <div>
            <label for="answer">Your Answer:</label>
            <textarea wire:model="answer" id="answer"></textarea>
            <button wire:click="approveRequest">Submit</button>
        </div>
    @endif
    
    
</div>
