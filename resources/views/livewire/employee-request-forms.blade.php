@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="container">
    
        <div class="">
            <div class="container-fluid">
                <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                    <h3 class="px-4"><i class="fa-solid fa-chart-bar mr-3"></i>{{ __('Dashboard') }}</h3>
                    {{-- grid --}}
                    <div class="col">
                        {{-- Leave Request --}}
                        <div class="card my-4 ">
                            <div class="card-body">
                                <h5>Leave Request</h5>
                                @livewire('timeoff')
                                @livewire('list-leave')
                            </div>
                        </div>
                        {{-- Document Request --}}
                        <div class="card my-4">
                            <div class="card-body">
                                <h5>Document Request</h5>
                                @livewire('document-request-form')
                                @livewire('list-document')
                            </div>
                        </div>

                        <div class="card my-4">
                            <div class="card-body">
                                <h5>Loan Request</h5>
                                @livewire('loan')
                                @livewire('list-loan')
                            </div>
                        </div>

                    </div>











                 
                </div>
            </div>
        </div>
    </div>
@endsection
@livewireScripts
