@extends('layouts.app')
@livewireStyles
@section('content')

    <div class="d-flex">
        @Include('layouts.sidebar-admin')
       
  
            {{-- grid --}}
            <div class="col">
                {{-- Document Request --}}
                <div class=" my-4 shadow-sm">
                 

                        @livewire('admin-document-requests')
                 
                </div>
            </div>
       
    </div>
@endsection
@livewireScripts
