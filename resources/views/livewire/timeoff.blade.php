<div>
    <form wire:submit.prevent="save">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Start date</label>
                <input type="date" class="form-control" id="start_date" wire:model="start_date" required>
            </div>

            <div class="form-group col-md-6">
                <label for="end_date">End date</label>
                <input type="date"  class="form-control" id="end_date" wire:model="end_date" required>
            </div>

            <div class="form-group col-md-12">
                <label for="reason">Reason</label>
                <input type="text" class="form-control" placeholder="Reason" id="reason" wire:model="reason" required >
            </div>

            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="txtdescription" class="form-control" placeholder="Description"></textarea>
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
