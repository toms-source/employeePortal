@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="d-flex">
        @Include('layouts.sidebar-admin')

        <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
            

                {{-- grid --}}
                <div class="col"> 
                    <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} VINCENT
                                DELA CRUZ Profile</h5>

                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-outline-primary"><i class="fa-solid fa-gear"></i>Account Setting</button>
                        </div>

                    {{-- Document Request --}}
                    <div class="shadow my-5">
                        <div class="card-body py-5">
                            @livewire('profile')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
@livewireScripts
