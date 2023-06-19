<div class="">

    <div class="card">
        <div class="card-body">
            <div class="card-title"><h3>Leave Request Pending</h3></div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveRequests as $request)
                        @if ($request->status == 'Pending')
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->user->first_name . " " . $request->user->last_name }}</td>
                            <td>{{ $request->user->department }}</td>
                            <td>{{ $request->start_date }}</td>
                            <td>{{ $request->end_date }}</td>
                            <td>{{ $request->reason }}</td>
                            <td>{{ $request->status }}</td>
                            <td>
                                @if ($request->status == 'Pending')
                                    <button class="btn btn-success" wire:click="selectRequestForApproval({{ $request->id }})">Approve</button>
                                    <button class="btn btn-danger" wire:click="deny({{ $request->id }})">Deny</button>
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
            <div class="card-title"><h3>Leave Request Approved</h3></div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveRequests as $request)
                        @if ($request->status == 'Approved')
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->user->first_name . " " . $request->user->last_name }}</td>
                            <td>{{ $request->user->department }}</td>
                            <td>{{ $request->start_date }}</td>
                            <td>{{ $request->end_date }}</td>
                            <td>{{ $request->reason }}</td>
                            <td>{{ $request->status }}</td>
                            <td>
                                @if ($request->status == 'Pending')
                                    <button class="btn btn-success" wire:click="selectRequestForApproval({{ $request->id }})">Approve</button>
                                    <button class="btn btn-danger" wire:click="deny({{ $request->id }})">Deny</button>
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
            <div class="card-title"><h3>Leave Request Denied</h3></div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
              
                        <th>Status</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveRequests as $request)
                        @if ($request->status == 'Denied')
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->user->first_name . " " . $request->user->last_name }}</td>
                            <td>{{ $request->user->department }}</td>
                            <td>{{ $request->start_date }}</td>
                            <td>{{ $request->end_date }}</td>
                            <td>{{ $request->reason }}</td>
                    
                            <td>{{ $request->status }}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve this leave request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    @if($selectedRequest)
                    <button type="button" class="btn btn-primary" wire:click="confirmApprove()">Confirm</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="denyDocu" tabindex="-1" role="dialog"
    aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordinanceAddedModalLabel">Leave Deny</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to deny this Leave Request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-5 btn btn-outline-danger" data-dismiss="modal" wire:click='denyConfirm()'>Yes</button>
                    <button type="button" class="px-5 btn btn-outline-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('denyDocu',() =>{
            console.log('ordinanceAdded event received');

            // document.getElementById('ordinanceDelete').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'denyDocu'));
            modalOrdinanceAdded.show();
        });
    });
    window.livewire.on('showConfirmationModal', () => {
        $('#confirmationModal').modal('show');
    });
    window.livewire.on('hideConfirmationModal', () => {
        $('#confirmationModal').modal('hide');
    });
</script>