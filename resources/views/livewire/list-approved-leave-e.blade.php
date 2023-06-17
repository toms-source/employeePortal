<div>
    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Reason</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appLeave as $appLeaves)
                    <tr class="text-center">
        
                        <td>{{ $appLeaves->reason }}</td>
                        <td>{{ $appLeaves->start_date }}</td>
                        <td>{{ $appLeaves->end_date }}</td>
                        <td>{{ $appLeaves->status }}</td>
                        {{-- <td>  --}}
                            {{-- <button class="fa fa-edit border-0" data-target="#ope" type="button" data-toggle="modal"></button> --}}
                            {{-- <a><i class="fa-solid fa-trash-can"style="color: #e61919;" wire:click="deleteRequestDocu({{$docuReqs->id}})"></i></a> --}}
                        {{-- </td> --}}
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $appLeave->links() }}</div>
        
    </div>
    <div class="modal fade" id="deleteReqD" tabindex="-1" role="dialog"
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
        window.livewire.on('deleteReqD',() =>{
            console.log('ordinanceAdded event received');

            // document.getElementById('ordinanceDelete').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'deleteReqD'));
            modalOrdinanceAdded.show();
        });
    });
</script>
