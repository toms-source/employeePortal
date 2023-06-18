@extends('layouts.app')
@livewireStyles
@section('content')


    <div class="d-flex">
        @Include('layouts.sidebar')
        <div class="content container-fluid py-4" style="width: 100%; height: 100vh;">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <h3 class="px-4"><i class="fa-solid fa-chart-bar mr-3"></i>
                    {{ __('Approved') }}
                </h3>
                {{-- grid --}}
                <div class="col">
                    {{-- Document Request --}}
                    <div class="card my-4 shadow-sm">
                        <div class="card-body">
                            <h5>Leave Request</h5>

                            @livewire('list-approved-leave-e')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@livewireScripts
