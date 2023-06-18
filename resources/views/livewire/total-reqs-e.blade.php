<div>
    <div class="row mt-2 mb-3 ml-3 mr-3">
        <h3 class="px-4"><i class="fa-solid fa-folder-open"></i>
            {{ __('Requests') }}

        </h3>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold">
                    Total Requests
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalReq}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Document Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalD}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Leave Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalLe}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Loan Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalLo}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Other Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalO}}</h1>
                </div>
            </div>
        </div>


        <hr class="my-3">
        <h3 class="px-4"><i class="icon fa-solid fa-clock" style="color: #000000;"></i>
            {{ __('Pending') }}
        </h3>

        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Document Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalDPen}}</h1>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Leave Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalLePen}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Loan Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalLoPen}}</h1>
                </div>
            </div>
        </div>


        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Other Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalOPen}}</h1>
                </div>
            </div>
        </div>

        <hr class="mt-3 mb-3">
        <h3 class="px-4"><i class="fa-solid fa-check" style="color: #000000"></i>
            {{ __('Approved') }}
        </h3>

        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Document Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalDApp}}</h1>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Leave Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalLeApp}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Loan Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalLoApp}}</h1>
                </div>
            </div>
        </div>


        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header fw-bold">
                    Other Request
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$totalOApp}}</h1>
                </div>
            </div>
        </div>

    </div>

    {{-- Because she competes with no one, no one can compete with her. --}}
    
</div>
