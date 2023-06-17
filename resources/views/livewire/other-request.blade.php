<div>
    <form wire:submit.prevent="save">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="request_type">Request Type</label>
                <input type="text" class="form-control" id="request_type" wire:model="request_type" required>
            </div>
            <div class="form-group col-md-6">
                <label for="request_details">Request Details</label>
                <textarea id="request_details" class="form-control" placeholder="Request Details" wire:model="request_details" required></textarea>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>         
    </form>
    
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
</div>
