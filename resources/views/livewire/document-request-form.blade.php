<div>
    <label for="reason">Document Type</label>

    <form wire:submit.prevent="save">
     <div class="form-outline mb-4">
        <textarea class="form-control" wire:model="reason" id="reason" placeholder="Note..." rows="5"></textarea>
     </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>         
    </form>
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
</div>