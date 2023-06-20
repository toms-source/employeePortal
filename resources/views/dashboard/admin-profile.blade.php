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


                    <div class="shadow my-5">
                        <div class="card-body py-5">
                            <div>
                                <div class="container">
                                   <div class="row justify-content-center">
                                       <div class="col-md-12">
                                           <div class="">
                                               <h5 class="fw-bold">{{ __('Employment Profile') }}</h5>
                                           </div>
                           
                                           <hr>


                                       <div class="row gap-3">
                                           <div class="row">
                                                <div class="col form-group">
                                                    <label for="department">{{ __('Department') }}</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Department</option>
                                                        <option value="IT">IT</option>
                                                        <option value="softwareEngineer">Software Engineer</option>
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="position">{{ __('Position') }}</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Position</option>
                                                        <option value="Developer">Developer</option>
                                                        <option value="Designer">Designer</option>
                                                        <option value="Manager">Manager</option>
                                                    </select>
                                                </div>
                                            </div>
                           
                                           <div class="row">
                                               <div class="col form-group">
                                                   <label for="description">{{ __('Description') }}</label>
                                                   <textarea id="reason" class="form-control" placeholder="Note..." rows="4" wire:model="reason" required></textarea>
                                               </div>
                                           </div>

                                           <div class="row">
                                            <div class="col form-group">
                                                <label for="salaryRate">{{ __('Salary Rate') }}</label>
                                                <input id="salaryRate" type="number" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col form-group">
                                                <label for="status">{{ __('Status') }}</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Status</option>
                                                    <option value="Hired">Hired</option>
                                                    <option value="Contractual">Contractual</option>
                                                </select>
                                            </div>

                                            <div class="col form-group">
                                                <label for="startDate">{{ __('Start Date') }}</label>
                                                <input id="startDate" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col form-group">
                                                <label for="endDate">{{ __('End Date') }}</label>
                                                <input id="endDate" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                       </div>
                           
                                    </div>
                                   </div>
                               </div>
                           
                           
                           </div>
                           
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3 p-4 gap-3">
                        <button class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                        <button class="btn btn-outline-danger"><i class="fa-solid fa-ban"></i>Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
@livewireScripts
