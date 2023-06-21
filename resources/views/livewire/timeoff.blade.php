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
                <select class="form-control" id="reason" wire:model="reason" required>
                    <option value="">Select a reason</option>
                    <option value="Sick leave">Sick leave</option>
                    <option value="Casual leave">Casual leave</option>
                    <option value="Public holiday">Public holiday</option>
                    <option value="Religious holidays">Religious holidays</option>
                    <option value="Maternity leave">Maternity leave</option>
                    <option value="Paternity leave">Paternity leave</option>
                    <option value="Bereavement leave">Bereavement leave</option>
                    <option value="Compensatory leave">Compensatory leave</option>
                </select>
            </div>
            
     
        </div>
            <button class="btn btn-success btn-lg btn-block mt-3" type="submit">Submit</button>         
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
