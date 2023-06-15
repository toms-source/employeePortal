<div>
    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loan as $loans)
                    <tr class="text-center">
        
                        <td>{{ $loans->amount }}</td>
                        <td>{{ $loans->reason }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $loan->links('pagination::bootstrap-5') }}</div>
        
    </div>
 

</div>