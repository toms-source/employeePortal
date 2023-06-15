<div>
    <form wire:submit.prevent="save">
        <label for="start_date">Start Date</label>
        <input type="date" id="start_date" wire:model="start_date" required>

        <label for="end_date">End Date</label>
        <input type="date" id="end_date" wire:model="end_date" required>

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
