@extends('layouts.app')
@livewireStyles
@section('content')
    <style>
        .sidebar {
            width: 350px;
            box-shadow: 0 2px 0 0 white;
            height: 100vh;
        }

        .sidebar-content {
            margin-top: 50px;
            padding: 35px;
        }

        .btns {
            margin-bottom: 25px;
            width: auto;
        }

        .icon {
            margin-right: 3px;
        }
    </style>
    <div class="d-flex">
        @Include('layouts.sidebar')

        <div class="col-10 mt-3">
            <div class="card shadow p-3 mb-5 bg-white rounded">
              
                    <div class="card my-4 shadow-sm">
                        

                            @livewire('total-reqs-e')
                        
                    </div>
               
            </div>
        </div>

    </div>
@endsection
@livewireScripts
