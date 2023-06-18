@extends('layouts.app')
@livewireStyles
@section('content')

<style>


</style>
        <div class="d-flex">
        @Include('layouts.sidebar')
        <div class="content container-fluid py-4" style="width: 100%; height: 100vh;">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <h3 class="px-4"><i class="fa-solid fa-pen-to-square"></i>
                    {{ __('Document Request Form') }}
                </h3>
                        {{-- grid --}}
                    <div class="col">
                                {{-- Document Request pending--}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Document Request</h5>
                      
                                @livewire('document-request-form')
                            </div>
                    </div>
             </div>
        </div>
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <h3 class="px-4"><i class="icon fa-solid fa-clock" style="color: #000000;"></i>
                {{ __('Pending') }}
            </h3>
                    {{-- grid --}}
                <div class="col">
                            {{-- Document Request --}}
                    <div class="card my-4 shadow-sm">
                        <div class="card-body">
                            <h5>Document Request</h5>
                  
                            @livewire('list-document')
                        </div>
                </div>
         </div>
    </div>
    </div>
@endsection
@livewireScripts
