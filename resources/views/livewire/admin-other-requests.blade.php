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
                                                wire:click="rejectRequest({{ $request->id }})">Reject</button>
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



</div>
