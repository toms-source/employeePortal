<div class="">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Amount</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loanRequests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->user_id }}</td>
                    <td>{{ $request->amount }}</td>
                    <td>{{ $request->reason }}</td>
                    <td>{{ $request->status }}</td>
                    <td>
                        @if ($request->status == 'Pending')
                            <button class="btn btn-success" wire:click="approve({{ $request->id }})">Approve</button>
                            <button class="btn btn-danger" wire:click="deny({{ $request->id }})">Deny</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
