<div>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Document Type</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    
        @foreach($documentRequests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->user_id }}</td>
                <td>
                    @if($request->file_path) <!-- If the file_path is not null, display the document link -->
                     <a href="{{ asset('storage/' . $request->file_path) }}" target="_blank">Document</a>
                    @elseif(($request->file_path)==null)
                        No File Uploaded
                    @endif
                </td>
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
    
    @if ($selectedRequest && $selectedRequest->status == 'Pending')
        <div>
            <h2>Upload document for request ID {{ $selectedRequest->id }}</h2>
            <input type="file" wire:model="document">
            @error('document') <span class="error">{{ $message }}</span> @enderror
    
            <button wire:click="upload">Upload</button>
        </div>
    @endif
    
</div>
