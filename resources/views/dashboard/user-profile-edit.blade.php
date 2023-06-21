@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="d-flex">
        @Include('layouts.sidebar')

        <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
            

                {{-- grid --}}
                <div class="col"> 
                    <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded"> 
                        <a href="{{route('user.profile')}}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s Profile</a>  > Edit</h5>

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{route('user.account.setting')}}" class="btn btn-outline-primary"><i class="fa-solid fa-gear"></i>Account Setting</a>
                        </div>

                    {{-- Document Request --}}
                    <div class="shadow border fw-bold p-3 mb-3 bg-white rounded">
                        <div class="card-body py-5">
                            @livewire('user-profile-edit')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
@livewireScripts
