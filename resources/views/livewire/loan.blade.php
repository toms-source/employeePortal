<div>
    <form wire:submit.prevent="save">
        <label for="amount">Amount</label>
        <input type="number" id="amount" wire:model="amount" required>
        
        <label for="reason">Reason</label>
        <textarea id="reason" wire:model="reason" required></textarea>
        
        <button type="submit">Submit</button>
    </form>
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
</div>
