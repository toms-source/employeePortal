@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="d-flex">
        @Include('layouts.sidebar-admin')

        <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
            

                {{-- grid --}}
                <div class="col">
                    <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded"> {{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }} VINCENT
                        DELA CRUZ > Change Account Settings</h5>

                    {{-- Document Request --}}
                    <div class="shadow border fw-bold p-3 mb-3 bg-white rounded">
                        <div class="card-body py-5">
                            @livewire('admin-account-setting')
                        </div>
                    </div>
                </div> 
            <div class="d-flex justify-content-end mb-1 p-2 gap-3">
                <button class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                <button class="btn btn-outline-danger"><i class="fa-solid fa-ban"></i>Cancel</button>
            </div>
        </div>

    </div>
    </div>
@endsection
@livewireScripts
