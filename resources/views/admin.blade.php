@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Add Employee') }}</div>
                    @livewire('add-employee')
                </div>
            </div>
            <div class="col">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Document Request') }}</div>
                        @livewire('admin-document-requests')
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">{{ __('Leave Request') }}</div>
                        @livewire('admin-leave-requests')
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">{{ __('Loan Request') }}</div>
                        @livewire('admin-loan-requests')
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">{{ __('Other Request') }}</div>
                        @livewire('admin-other-requests')
                    </div>
                </div>

            </div>
     

        </div>
    </div>
@endsection
@livewireScripts
