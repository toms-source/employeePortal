<div class="">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>Loan Request Pending</h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Amount</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loanRequests as $request)
                        @if ($request->status == 'Pending')
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->user->first_name . " " . $request->user->last_name }}</td>
                            <td>{{ $request->user->department }}</td>
                            <td>{{ $request->amount }}</td>
                            <td>{{ $request->reason }}</td>
                            <td>{{ $request->status }}</td>
                            <td>
                                @if ($request->status == 'Pending')
                                    <button class="btn btn-success"
                                        wire:click="selectRequestForApproval({{ $request }})">Approve</button>
                                    <button class="btn btn-danger" wire:click="deny({{ $request }})">Deny</button>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">
                <h3>Loan Request Approved</h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Amount</th>
                        <th>Reason</th>
                        <th>Status</th>
                
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loanRequests as $request)
                        @if ($request->status == 'Approved')
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->user->first_name . " " . $request->user->last_name }}</td>
                            <td>{{ $request->user->department }}</td>
                            <td>{{ $request->amount }}</td>
                            <td>{{ $request->reason }}</td>
                            <td>{{ $request->status }}</td>
                  
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">
                <h3>Loan Request Denied</h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Amount</th>
                        <th>Reason</th>
                        <th>Status</th>
                
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loanRequests as $request)
                        @if ($request->status == 'Denied')
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->user->first_name . " " . $request->user->last_name }}</td>
                            <td>{{ $request->user->department }}</td>
                            <td>{{ $request->amount }}</td>
                            <td>{{ $request->reason }}</td>
                            <td>{{ $request->status }}</td>
                  
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve this loan request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    @if ($selectedRequest)
                        <button type="button" class="btn btn-primary" wire:click="confirmApprove()">Confirm</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    window.livewire.on('showConfirmationModal', () => {
        $('#confirmationModal').modal('show');
    });
    window.livewire.on('hideConfirmationModal', () => {
        $('#confirmationModal').modal('hide');
    });
</script>
