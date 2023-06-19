<div class="">

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>Other Request Pending</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Department</th>
                            <th>Request Type</th>
                            <th>Request Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($otherRequests as $request)
                            @if ($request->status == 'Pending')
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->user->first_name . ' ' . $request->user->last_name }}</td>
                                    <td>{{ $request->user->department }}</td>
                                    <td>{{ $request->request_type }}</td>
                                    <td>{{ $request->request_details }}</td>
                                    <td>{{ $request->status }}</td>

                                    <td>
                                        @if ($request->status == 'Pending')
                                            <button class="btn btn-success"
                                                wire:click="selectRequest({{ $request->id }})">Approve</button>
                                            <button class="btn btn-danger"
                                                wire:click="deny({{ $request->id }})">Reject</button>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                @if ($selectedRequest)
                    <div>
                        <label for="answer">Your Answer:</label>
                        <textarea class="form-control" wire:model="answer" id="answer"></textarea>
                        <button class="btn btn-primary mt-2" wire:click="approveRequest">Submit</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">
                <h3>Other Request Approved</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Department</th>
                            <th>Request Type</th>
                            <th>Request Details</th>
                            <th>Answer</th>
                            <th>Status</th>
                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($otherRequests as $request)
                            @if ($request->status == 'Approved')
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->user->first_name . ' ' . $request->user->last_name }}</td>
                                    <td>{{ $request->user->department }}</td>
                                    <td>{{ $request->request_type }}</td>
                                    <td>{{ $request->request_details }}</td>
                                    <td>{{ $request->answer }}</td>
                                    <td>{{ $request->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">
                <h3>Other Request Denied</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Department</th>
                            <th>Request Type</th>
                            <th>Request Details</th>
                  
                            <th>Status</th>
                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($otherRequests as $request)
                            @if ($request->status == 'Denied')
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->user->first_name . ' ' . $request->user->last_name }}</td>
                                    <td>{{ $request->user->department }}</td>
                                    <td>{{ $request->request_type }}</td>
                                    <td>{{ $request->request_details }}</td>
                             
                                    <td>{{ $request->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="denyDocu" tabindex="-1" role="dialog"
    aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordinanceAddedModalLabel">Other Deny</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to deny this Other Request?
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

