@livewireScripts
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
                    {{-- grid --}}
                    <div class="col">
                        {{-- Document Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Payslip</h5>

                                @livewire('view-payslip')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @livewireScripts
