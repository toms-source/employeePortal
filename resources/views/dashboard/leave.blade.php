@extends('layouts.app')
@livewireStyles
@section('content')

<style>

    .sidebar {
        width: 350px;
        box-shadow: 0 2px 0 0 white;
        height: 100vh;
    }
    .sidebar-content {
        margin-top: 50px;
        padding: 35px;
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
                <h3 class="px-4"><i class="fa-solid fa-chart-bar mr-3"></i>
                    {{ __('Leave Request Form') }}
                </h3>
                        {{-- grid --}}
                    <div class="col">
                                {{-- Document Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Leave Request</h5>
                      
                                @livewire('timeoff')
                            </div>
                    </div>
             </div>
        </div>
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <h3 class="px-4"><i class="fa-solid fa-chart-bar mr-3"></i>
                {{ __('Pending') }}
            </h3>
                    {{-- grid --}}
                <div class="col">
                            {{-- Document Request --}}
                    <div class="card my-4 shadow-sm">
                        <div class="card-body">
                            <h5>Leave Request</h5>
                  
                            @livewire('list-leave')
                        </div>
                </div>
         </div>
    </div>
    </div>
@endsection
@livewireScripts