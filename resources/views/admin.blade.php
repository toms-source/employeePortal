@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Employee') }}</div>
                    @livewire('add-employee')
                </div>
            </div>
        </div>
    </div>
@endsection
@livewireScripts
