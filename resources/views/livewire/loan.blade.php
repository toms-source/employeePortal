<div>
    <form wire:submit.prevent="save">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" wire:model="amount" required>
        </div>
        <div class="form-group col-md-6">
            <label for="reason">Reason</label>
            <textarea id="reason" class="form-control" placeholder="Reason" wire:model="reason" required></textarea>
        </div>
        
        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>         
    </form>
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
</div>