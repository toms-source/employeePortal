@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="d-flex">
        @Include('layouts.sidebar')
        <div class="col-10">
            <div class="mt-5 container-fluid" style="height: 100vh;">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h3 class="px-4"><i class="fa-solid fa-check" style="color: #000000"></i>
                        {{ __('Approved') }}
                    </h3>
                    {{-- grid --}}
                    <div class="col">
                        {{-- Document Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Document Request</h5>

                                @livewire('list-approved-docu-e')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@livewireScripts
