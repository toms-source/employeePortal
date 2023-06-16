<div>
    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Request Type</th>
                    <th>Request Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($otherReq as $otherReqs)
                    <tr class="text-center">
            
                        <td>{{ $otherReqs->request_type }}</td>
                        <td>{{ $otherReqs->request_details }}</td>
                        <td> 
                            {{-- <button class="fa fa-edit border-0" data-target="#ope" type="button" data-toggle="modal"></button> --}}
                            <a><i class="fa-solid fa-trash-can"style="color: #e61919;" wire:click="deleteRequestOth({{$otherReqs->id}})"></i></a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $otherReq->links('pagination::bootstrap-5') }}</div>
        
    </div>
    <div class="modal fade" id="deleteReqO" tabindex="-1" role="dialog"
    aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordinanceAddedModalLabel">Request Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="px-5 btn btn-outline-danger" data-dismiss="modal" wire:click='deleteRequest()'>Yes</button>
                    <button type="button" class="px-5 btn btn-outline-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('deleteReqO',() =>{
            console.log('ordinanceAdded event received');

            // document.getElementById('ordinanceDelete').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'deleteReqO'));
            modalOrdinanceAdded.show();
        });
    });
</script>