@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="container">
    
    
    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>Leave Request</h3>
                        @livewire('timeoff')
                        @livewire('list-leave')
                            <br>
                            <br>
                            <br>
                        <h3>Document Request</h3>
                        @livewire('document-request-form')
                        @livewire('list-document')
                        <br>
                        <br>
                        <br>
                        <h3>Loan Request</h3>
                        @livewire('loan')
                        @livewire('list-loan')
                  

                        <h3>Other Request</h3>
                        @livewire('other-request')
                

                        @livewire('dashboard')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@livewireScripts
