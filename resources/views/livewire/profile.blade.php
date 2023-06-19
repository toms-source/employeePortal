<div>
    <h5 class="shadow-sm p-1 mb-5 bg-white rounded"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} VINCENT
        DELA CRUZ Profile</h5>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Personal Profile') }}</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Add form fields for other columns of the 'users' table in the first row here -->
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee_number">{{ __('Employee Number') }}</label>
                                        <input id="employee_number" type="text"
                                            class="form-control @error('employee_number') is-invalid @enderror"
                                            name="employee_number" value="{{ old('employee_number') }}" required>
                                        @error('employee_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Add form fields for other columns of the 'users' table in the second row here -->
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Add form fields for other columns of the 'users' table in the third row here -->
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
