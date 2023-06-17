@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="container-fluid">

        {{-- sidebar --}}
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <h3 class="px-4"><i class="fa-solid fa-chart-bar mr-3"></i>
                {{ __('Dashboard') }}
            </h3>
                    {{-- grid --}}
                <div class="col">

                        {{-- Leave Request --}}
                    <div class="card my-4 shadow-sm">
                         <div class="card-body">
                            <h5>Leave Request</h5>
                            @livewire('timeoff')
                            @livewire('list-leave')
                            @livewire('list-approved-leave-e')
                        </div>
                    </div>

                        {{-- Document Request --}}
                    <div class="card my-4 shadow-sm">
                        <div class="card-body">
                            <h5>Document Request</h5>
                            @livewire('document-request-form')
                            @livewire('list-document')
                            @livewire('list-approved-docu-e')
                        </div>
                    </div>

                        {{-- Loan Request --}}
                    <div class="card my-4 shadow-sm">
                        <div class="card-body">
                            <h5>Loan Request</h5>
                             @livewire('loan')
                            @livewire('list-loan')
                            @livewire('list-approved-loan-e')
                        </div>
                    </div>

                        <div class="card my-4">
                            <div class="card-body">
                                <h5>Other Request</h5>
                                @livewire('other-request')
                                @livewire('list-others')
                                @livewire('list-approved-others-e')
                            </div>
                        </div>

                    </div>
         </div>
     </div>
@endsection
@livewireScripts
