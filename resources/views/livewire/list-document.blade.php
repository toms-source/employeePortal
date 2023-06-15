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
                @foreach ($docuReq as $docuReqs)
                    <tr class="text-center">
        
                        <td>{{ $docuReqs->reason }}</td>
                        <td>{{ $docuReqs->status }}</td>
                        <td> 
                            <button class="fa fa-edit border-0" data-target="#editordinance" type="button" data-toggle="modal"></button>
                            <a><i class="fa-solid fa-trash-can"style="color: #e61919;"></i></a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $docuReq->links('pagination::bootstrap-5') }}</div>
        
    </div>
 

</div>