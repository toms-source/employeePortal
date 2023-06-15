@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="container">

        <nav class="navbar" style="color: aqua">
            <div class="container-fluid">
              <span class="navbar-brand mb-0 h1">Navbar</span>
            </div>
          </nav>
    
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
                            <br>
                            <br>
                            <br>
                        <h3>Document Request</h3>
                        @livewire('document-request-form')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@livewireScripts
