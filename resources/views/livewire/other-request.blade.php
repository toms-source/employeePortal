<div>
    <form wire:submit.prevent="save">
        <label for="request_type">Request Type</label>
        <input type="text" id="request_type" wire:model="request_type" required>
        
        <label for="request_details">Request Details</label>
        <textarea id="request_details" wire:model="request_details" required></textarea>
        
        <button type="submit">Submit</button>
    </form>
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
</div>
