<div>
    <form wire:submit.prevent="save">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" wire:model="amount" required>
        </div>
        <div class="form-group col-md-12">
            <label for="reason">Reason</label>
            <textarea id="reason" class="form-control" placeholder="Note..." rows="5" wire:model="reason" required></textarea>
        </div>
     </div>
        <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>         
    </form>
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
</div>