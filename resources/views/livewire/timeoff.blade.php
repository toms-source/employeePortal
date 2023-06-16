<div>
    <form wire:submit.prevent="save">
       
       {{-- Date --}}
        <div class="text-center">
            <label for="start_date" class="fw-bold">Start Date</label>
            <input type="date" id="start_date" wire:model="start_date" required>
        
            <label for="end_date" class="fw-bold">End Date</label>
            <input type="date" id="end_date" wire:model="end_date" required>
        </div>

        {{-- Reason --}}
        <div class="my-3">
            <input type="text" class="form-control"placeholder="Reason"wire:model="reason">
        </div>
        <div class="d-flex justify-content-end">
             <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>


    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
