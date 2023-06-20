<div>
    <div class="row mt-2 mb-3 ml-3 mr-3">
        <h3 class="px-4"><i class="fa-solid fa-file"></i>
            {{ __('Requests') }}

        </h3>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Total Requests
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalReq}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Total Denied Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalReqDen}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Document Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalD}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Leave Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalLe}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Loan Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalLo}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Other Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalO}}</h1>
                </div>
            </div>
        </div>


        <hr class="mt-3 mb-3">
        <h3 class="px-4"><i class="icon fa-solid fa-clock" style="color: #000000;"></i>
            {{ __('Pending') }}
        </h3>

        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Document Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalDPen}}</h1>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Leave Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalLePen}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Loan Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalLoPen}}</h1>
                </div>
            </div>
        </div>


        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Other Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalOPen}}</h1>
                </div>
            </div>
        </div>

        <hr class="mt-3 mb-3">
        <h3 class="px-4"><i class="fa-solid fa-check" style="color: #000000"></i>
            {{ __('Approved') }}
        </h3>

        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Document Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalDApp}}</h1>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Leave Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalLeApp}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Loan Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalLoApp}}</h1>
                </div>
            </div>
        </div>


        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    Other Request
                </div>
                <div class="card-body">
                    <h1 class="text-center p-1">{{$totalOApp}}</h1>
                </div>
            </div>
        </div>

    </div>

    {{-- Because she competes with no one, no one can compete with her. --}}
    
</div>
