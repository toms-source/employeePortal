<div>
    <form wire:submit.prevent="save">
        <label for="reason">Document Type</label>
        <textarea wire:model="reason" id="reason" cols="100" rows="5"></textarea>
     
        <button type="submit">Submit</button>
    </form>
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
</div>
