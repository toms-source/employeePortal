@extends('layouts.app')
@livewireStyles
@section('content')


        <div class="d-flex">
        @Include('layouts.sidebar-admin')

        <div class="content container-fluid py-4" style="width: 100%; height: 100vh;">
            <div class="card shadow p-3 mb-5 bg-white rounded">
             
                {{-- grid --}}
                <div class="col">
                    {{-- Document Request --}}
                    <div class=" my-4 shadow-sm">
                        <div class="card-body">
                     
                  
                            @livewire('add-employee')
                            @livewire('edit-employee')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
@livewireScripts
