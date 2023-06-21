@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="d-flex">
        @Include('layouts.sidebar')
        <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
                {{-- grid --}}
                <div class="col">
                    <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded"> 
                    Document Request
                    </h5>
                </div> 
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    {{-- grid --}}
                    <div class="col">
                        {{-- Document Request pending --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Document Request Form</h5>

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
        </div>
    </div>
@endsection
@livewireScripts
