<div class="">


    <div class="card">
        <div class="card-body">
            <h3 class="">Payslips</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cutoff From</th>
                        <th>Cutoff To</th>
                        <th>Employee Name</th>
                        <th>Present Days Total</th>
                        <th>Regular Hours Total</th>
                        <th>Gross Pay</th>
                        <th>Deductions</th>
                        <th>Allowance</th>
                        <th>Net Pay</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payslip as $payslips)
                        <tr>
                            <td>{{ $payslips->cutoff_from }}</td>
                            <td>{{ $payslips->cutoff_to }}</td>
                            <td>{{ $payslips->employee_name}}</td>
                            <td>{{ $payslips->present_days_total }}</td>
                            <td>{{ $payslips->regular_hours_total }}</td>
                            <td>{{ $payslips->gross_pay }}</td>
                            <td>{{ $payslips->deductions }}</td>
                            <td>{{ $payslips->allowance }}</td>
                            <td>{{ $payslips->net_pay }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
