<div class="">


    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cutoff From</th>
                        <th>Cutoff To</th>
                        <th>Employee Name</th>
                        <th>Present Days Total</th>
                        <th>Regular Hours Total</th>
                        <th>OT Hours Total</th>
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
                            <td>{{ $userstuff->first_name. ' ' .$userstuff->last_name}}</td>
                            <td>{{ $payslips->present_days_total }}</td>
                            <td>{{ $payslips->regular_hours_total }}</td>
                            <td>{{ $payslips->ot_hours_total }}</td>
                            <td>{{ $payslips->gross_pay }}</td>
                            <td>{{ $payslips->deductions }}</td>
                            <td>{{ $payslips->allowance }}</td>
                            <td>{{ $payslips->net_pay }}</td>
                            <td>
                                <a href="{{ route('employee-payslip-view', $payslips->id ) }}"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
