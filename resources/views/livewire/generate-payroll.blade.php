<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h2>Payslip Generator</h2>

    <form wire:submit.prevent="generatePayslip">
        <div class="form-group">
            <label for="payrollListId">Select Payroll List:</label>
            <select wire:model="payrollListId" class="form-control">
                <option value="">-- Select Payroll List --</option>
                @foreach ($payrollList as $list)
                    <option value="{{ $list->id }}">{{ $list->cutoff_from }} - {{ $list->cutoff_to }}</option>
                @endforeach
            </select>
            @error('payrollListId')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Generate Payslip</button>
    </form>

    @if ($payrollListId)
        <h3>Payslip Details</h3>

        @if ($payrollList)
            <ul>
                <li><strong>Cutoff From:</strong> {{ $payrollList->cutoff_from }}</li>
                <li><strong>Cutoff To:</strong> {{ $payrollList->cutoff_to }}</li>
                <li><strong>Present Days Total:</strong> {{ $payrollList->present_days_total }}</li>
                <li><strong>Regular Hours Total:</strong> {{ $payrollList->regular_hours_total }}</li>
                <li><strong>Gross Pay:</strong> {{ $payrollList->gross_pay }}</li>
                <li><strong>Deductions:</strong> {{ $payrollList->deductions }}</li>
                <li><strong>Allowance:</strong> {{ $payrollList->allowance }}</li>
                <li><strong>Net Pay:</strong> {{ $payrollList->net_pay }}</li>
            </ul>
        @endif
    @endif
</div>