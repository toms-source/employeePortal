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
                    <h3 class="px-4"><i class="icon fa-solid fa-calendar" style="color: #000000;"></i>
                        {{ __('Attendance') }}
                    </h3>
                    {{-- grid --}}
                    <div class="col">
                        {{-- Document Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">


                                @livewire('attendance-calendar')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @livewireScripts
