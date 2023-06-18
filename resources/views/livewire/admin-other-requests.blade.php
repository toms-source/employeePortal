<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Request Type</th>
                <th>Request Details</th>
                <th>Status</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
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
                            <button class="btn btn-success" wire:click="selectRequest({{ $request->id }})">Approve</button>
                            <button class="btn btn-danger" wire:click="rejectRequest({{ $request->id }})">Reject</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @if($selectedRequest)
        <div>
            <label for="answer">Your Answer:</label>
            <textarea class="form-control" wire:model="answer" id="answer"></textarea>
            <button class="btn btn-primary" wire:click="approveRequest">Submit</button>
        </div>
    @endif
</div>
