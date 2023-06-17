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

        <div class="sidebar shadow align-self-center">
            
            <div class="sidebar-content">
                <div class="btns">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon fa-solid fa-folder-open" style="color: #000000;"></i>Document Request
                    </div>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Document Request 1</a></li>
                    <li><a class="dropdown-item" href="#">Document Request 2</a></li>
                    <li><a class="dropdown-item" href="#">Document Request 3</a></li>
                    </ul>
                </div>

                <div class="btns">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon fa-solid fa-person-walking-arrow-right" style="color: #000000;"></i>Leave Request
                    </div>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Document Request 1</a></li>
                    <li><a class="dropdown-item" href="#">Document Request 2</a></li>
                    <li><a class="dropdown-item" href="#">Document Request 3</a></li>
                    </ul>
                </div>

                <div class="btns">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon fa-solid fa-money-bill-1" style="color: #000000;"></i>Loan Request
                    </div>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Document Request 1</a></li>
                    <li><a class="dropdown-item" href="#">Document Request 2</a></li>
                    <li><a class="dropdown-item" href="#">Document Request 3</a></li>
                    </ul>
                </div>

                <div class="btns">
                    <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon fa-solid fa-repeat" style="color: #000000;"></i> Other Request
                    </div>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Document Request 1</a></li>
                    <li><a class="dropdown-item" href="#">Document Request 2</a></li>
                    <li><a class="dropdown-item" href="#">Document Request 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content container-fluid py-4" style="width: 100%; height: 100vh;">
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
                            </div>
                        </div>
    
                            {{-- Document Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Document Request</h5>
                                @livewire('document-request-form')
                                @livewire('list-document')
                            </div>
                        </div>
    
                            {{-- Loan Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Loan Request</h5>
                                 @livewire('loan')
                                @livewire('list-loan')
                            </div>
                        </div>
    
                            <div class="card my-4">
                                <div class="card-body">
                                    <h5>Other Request</h5>
                                    @livewire('other-request')
                                    @livewire('list-others')
                                </div>
                            </div>
    
                        </div>
             </div>
        </div>
       
     </div>
  
@endsection
@livewireScripts
