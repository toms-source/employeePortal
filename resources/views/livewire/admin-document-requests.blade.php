<div class="">


    <div class="card">
        <div class="card-body">
            <h3 class="">Document Request Pending</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Full name</th>
                        <th>Department</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentRequests as $request)
                        @if ($request->status == 'Pending')
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user_id }}</td>
                                <td>{{ $request->user->first_name . ' ' . $request->user->first_name }}</td>
                                <td>{{ $request->user->department }}</td>
                                <td>
                                    {{ $request->reason }}
                                </td>
                                <td>{{ $request->status }}</td>
                                <td>
                                    @if ($request->status == 'Pending')
                                        <button class="btn btn-success"
                                            wire:click="approve({{ $request->id }})">Approve</button>
                                        <button class="btn btn-danger"
                                            wire:click="deny({{ $request->id }})">Deny</button>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            @if ($selectedRequest && $selectedRequest->status == 'Pending')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Upload Document for Request ID {{ $selectedRequest->id }}</h5>
                    <input type="file" class="form-control" wire:model="document">
                    @error('document') <span class="text-danger">{{ $message }}</span> @enderror
                    <button class="btn btn-primary mt-3" wire:click="upload">Upload</button>
                </div>
            </div>
        @endif
    
        </div>
    </div>



    <div class="card mt-5">
        <div class="card-body">
            <h3 class="mt-3">Document Request Approved</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Full name</th>
                        <th>Department</th>
                        <th>Document Type</th>
                        <th>Status</th>
                     
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentRequests as $request)
                        @if ($request->status == 'Approved')
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user_id }}</td>
                                <td>{{ $request->user->first_name . ' ' . $request->user->first_name }}</td>
                                <td>{{ $request->user->department }}</td>
                                <td>
                                    @if ($request->file_path)
                                        <a href="{{ asset('storage/' . $request->file_path) }}"
                                            target="_blank">Document</a>
                                    @else
                                        No File Uploaded
                                    @endif
                                </td>
                                <td>{{ $request->status }}</td>
         
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="card mt-5">
        <div class="card-body">
            <h3 class="mt-3">Document Request Denied</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Full name</th>
                        <th>Department</th>
                        <th>Document Type</th>
                        <th>Reason</th>
                        <th>Status</th>
               
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentRequests as $request)
                        @if ($request->status == 'Denied')
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user_id }}</td>
                                <td>{{ $request->user->first_name . ' ' . $request->user->first_name }}</td>
                                <td>{{ $request->user->department }}</td>
                                <td>
                                    @if ($request->file_path)
                                        <a href="{{ asset('storage/' . $request->file_path) }}"
                                            target="_blank">Document</a>
                                    @else
                                        No File Uploaded
                                    @endif
                                </td>
                                <td>{{ $request->reason }}</td>
                                <td>{{ $request->status }}</td>
        
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
