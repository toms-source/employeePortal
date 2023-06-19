<div>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <h5 class="fw-bold">{{ __('Personal Profile') }}</h5>
                </div>

                <hr>
            <div class="row gap-3">
                <div class="row">
                    <div class="col form-group">
                        <label for="lastName">{{ __('Last Name') }}</label>
                        <input id="lastName" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col form-group">
                        <label for="firstName">{{ __('First Name') }}</label>
                        <input id="firstName" type="text"
                            class="form-control @error('employee_number') is-invalid @enderror"
                            name="employee_number" value="{{ old('employee_number') }}" required>
                        @error('employee_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="middleName">{{ __('Middle Name') }}</label>
                        <input id="middleName" type="text"
                            class="form-control @error('employee_number') is-invalid @enderror"
                            name="employee_number" value="{{ old('employee_number') }}" required>
                        @error('employee_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label for="gender">{{ __('Gender') }}</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>


                        {{-- <label for="gender">{{ __('Gender') }}</label>
                        <input id="lastName" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    
                    <div class="col form-group">
                        <label for="birthDate">{{ __('Birthdate') }}</label>
                        <input id="birthDate" type="text"
                            class="form-control @error('employee_number') is-invalid @enderror"
                            name="employee_number" value="{{ old('employee_number') }}" required>
                        @error('employee_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="civilStatus">{{ __('Civil Status') }}</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                          </select>
                        {{-- <label for="civilStatus">{{ __('Civil Status') }}</label>
                        <input id="middleName" type="text"
                            class="form-control @error('employee_number') is-invalid @enderror"
                            name="employee_number" value="{{ old('employee_number') }}" required>
                        @error('employee_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label for="mobileNumber">{{ __('Mobile Number') }}</label>
                        <input id="mobileNumber" type="number" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="text"
                            class="form-control @error('email') is-invalid @enderror"
                            name="employee_number" value="{{ old('email') }}" required>
                        @error('employee_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="address">{{ __('Address') }}</label>
                        <input id="address" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label for="tin">{{ __('TIN') }}</label>
                        <input id="lastName" type="number" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col form-group">
                        <label for="sss">{{ __('SSS') }}</label>
                        <input id="firstName" type="number"
                            class="form-control @error('employee_number') is-invalid @enderror"
                            name="employee_number" value="{{ old('employee_number') }}" required>
                        @error('employee_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="philHealth">{{ __('Phil-Health') }}</label>
                        <input id="middleName" type="number"
                            class="form-control @error('employee_number') is-invalid @enderror"
                            name="employee_number" value="{{ old('employee_number') }}" required>
                        @error('employee_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="pagibig">{{ __('PAGIBIG') }}</label>
                        <input id="pagibig" type="number"
                            class="form-control @error('employee_number') is-invalid @enderror"
                            name="employee_number" value="{{ old('employee_number') }}" required>
                        @error('employee_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <small class="fw-bold">Incase of Emergency Contact:</small>
                    <div class="col form-group">
                        
                        <label for="emergencyName">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        
                        <label for="emergencyNumber">{{ __('Number') }}</label>
                        <input id="emergencyNumber" type="number" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        
                        <div class="col form-group">
                            <label for="relationship">{{ __('Relationship') }}</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Relationship</option>
                                <option value="Mother">Mother</option>
                                <option value="Father">Father</option>
                                <option value="Children">Children</option>
                              </select>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
   


</div>
