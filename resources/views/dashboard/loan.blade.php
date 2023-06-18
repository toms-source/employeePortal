@extends('layouts.app')
@livewireStyles
@section('content')

<style>

    .sidebar {
        width: 25%;
        box-shadow: 0 2px 0 0 white;
        height: 100vh;
        position: sticky;
        top: 0;
        overflow: hidden;
    }
    .content {
        margin-top: 50px;
        padding: 35px;
        flex: 1;
        overflow-y: scroll;
        height: 100vh; 
    }

    .btns {
        margin-bottom: 25px;
        width: auto;
    }

    .icon {
        margin-right: 3px;
    }
    
</style>
        <div class="d-flex">
        @Include('layouts.sidebar')
        <div class="content container-fluid py-4" style="width: 100%; height: 100vh;">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <h3 class="px-4"><i class="fa-solid fa-pen-to-square"></i>
                    {{ __('Loan Request Form') }}
                </h3>
                        {{-- grid --}}
                    <div class="col">
                                {{-- Document Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Loan Request</h5>
                      
                                @livewire('loan')
                            </div>
                    </div>
             </div>
        </div>
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <h3 class="px-4"><i class="icon fa-solid fa-clock" style="color: #000000;"></i>
                {{ __('Pending') }}
            </h3>
                    {{-- grid --}}
                <div class="col">
                            {{-- Document Request --}}
                    <div class="card my-4 shadow-sm">
                        <div class="card-body">
                            <h5>Loan Request</h5>
                  
                            @livewire('list-loan')
                        </div>
                </div>
         </div>
    </div>
    </div>
@endsection
@livewireScripts
