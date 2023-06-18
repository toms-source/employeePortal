@extends('layouts.app')
@livewireStyles
@section('content')
    <style>



    </style>
    <div class="d-flex">
        @Include('layouts.sidebar')
        <div class="col-10">
            <div class=" container-fluid mt-5" style="width: 100%; height: 100vh;">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h3 class="px-4"><i class="fa-solid fa-pen-to-square"></i>
                        {{ __('Other Request Form') }}
                    </h3>
                    {{-- grid --}}
                    <div class="col">
                        {{-- Document Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Other Request</h5>

                                @livewire('other-request')
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
                                <h5>Other Request</h5>

                                @livewire('list-others')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @livewireScripts
