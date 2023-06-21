@extends('layouts.app')
@livewireStyles
@section('content')

    <div class="d-flex">
        @Include('layouts.sidebar-admin')
        <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
             {{-- grid --}}
                <div class="col">
                    <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded"> 
                    Payroll
                    </h5>

                    <div class="card my-4 shadow-sm bg-white rounded">
                            <div class="card-body">
                  

                                @livewire('generate-payroll')
                            </div>
                        </div>
                </div> 
        </div>    
    </div>  
    @endsection
    @livewireScripts
