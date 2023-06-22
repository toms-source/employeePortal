
<form enctype="multipart/form-data">
    @csrf
    <div>
        <div class="container">
            <div class="row justify-content-center">
                @if (session()->has('message'))
                    <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="">
                        <h5 class="fw-bold">{{ __('Personal Profile') }}</h5>
                    </div>

                    <hr>
                    <div class="col-md-4">
                        <div class="mb-3">
                            @if ($profile_picture)
                                <img src="{{ asset('storage/' . $profile_picture) }}"
                                    alt="Profile Preview" class="img-thumbnail" style="width: 200px; height: 200px;">
                            @else
                                <img class="rounded" src="{{ asset('image/default.jpg') }}" height="200"
                                    width="200" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="row gap-3">
                        <div class="row">
                            <div class="col form-group">
                                <label for="lastName">{{ __('Last Name') }}</label>
                                <input disabled wire:model="last_name" type="text" name="last_name"
                                    class="form-control" required>
                               
                            </div>

                            <div class="col form-group">
                                <label for="firstName">{{ __('First Name') }}</label>
                                <input disabled wire:model="first_name" type="text" name="first_name"
                                    class="form-control" required>
                                
                            </div>
                            <div class="col form-group">
                                <label for="middleName">{{ __('Middle Name') }}</label>
                                <input disabled wire:model="middle_name" type="text" name="middle_name"
                                    class="form-control" required>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="gender">{{ __('Gender') }}</label>
                                <select disabled class="form-select" aria-label="Default select example"
                                    wire:model="gender" required>
                                    <option selected>Male</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col form-group">
                                <label for="birth_date">{{ __('Birthdate') }}</label>
                                <input disabled wire:model="birth_date" type="date" class="form-control"
                                    id="birth_date" required>
                                
                            </div>

                            <div class="col form-group">
                                <label for="civilStatus">{{ __('Civil Status') }}</label>
                                <select disabled wire:model="civil_status" class="form-select"
                                    aria-label="Default select example" required>
                                    <option selected>Single</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="number">{{ __('Mobile Number') }}</label>
                                <input disabled id="number" type="number" wire:model="number" class="form-control "
                                    name="number" required autocomplete="number">
                                
                            </div>

                            <div class="col form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input disabled wire:model="email" type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                
                            </div>

                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input disabled wire:model="address" type="text" name="address" class="form-control"
                                    required>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="tin">{{ __('TIN') }}</label>
                                <input disabled id="tin" type="number" wire:model="tin" class="form-control "
                                    name="tin" required autofocus>
                                
                            </div>

                            <div class="col form-group">
                                <label for="sss">{{ __('SSS') }}</label>
                                <input disabled id="sss" type="number" wire:model="sss" class="form-control "
                                    name="sss" required autofocus>
                               
                            </div>
                            <div class="col form-group">
                                <label for="philhealth">{{ __('Phil-Health') }}</label>
                                <input disabled id="philhealth" type="number" wire:model="philhealth"
                                    class="form-control " name="philhealth" required autofocus>
                                
                            </div>
                            <div class="col form-group">
                                <label for="pagibig">{{ __('PAGIBIG') }}</label>
                                <input disabled id="pagibig" type="number" wire:model="pagibig"
                                    class="form-control " name="pagibig" required autofocus>
                                
                            </div>
                        </div>


                        <div class="row">
                            <small class="fw-bold">Incase of Emergency Contact:</small>
                            <div class="col form-group">

                                <label for="emergencyName">{{ __('Name') }}</label>
                                <input disabled id="contact_name" type="text" class="form-control"
                                    name="contact_name" wire:model="contact_name" required autofocus>
                                
                            </div>
                            <div class="col form-group">
                                <label for="contact_number">{{ __(' Number') }}</label>
                                <input disabled id="contact_number" type="number" class="form-control"
                                    name="contact_number" wire:model="contact_number" required autofocus>
                                
                            </div>
                            <div class="col form-group">
                                <div class="col form-group">
                                    <label for="contact_relationship">{{ __('Relationship') }}</label>
                                    <input disabled  id="contact_relationship" type="text" class="form-control"
                                        name="contact_relationship" wire:model="contact_relationship" required
                                        autofocus>
                                    

                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="container">
                                <div class="row justify-content-center my-5">
                                    <div class="col-md-12">
                                        <div class="">
                                            <h5 class="fw-bold">{{ __('Employment Profile') }}</h5>
                                        </div>
                                        <hr>
                                        <div class="row gap-3">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="department">{{ __('Department') }}</label>
                                                    <select disabled wire:model="department" class="form-select"
                                                        required aria-label="Default select example">
                                                        <option selected>Department</option>
                                                        <option value="IT">IT</option>
                                                        <option value="softwareEngineer">Software Engineer</option>
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="position">{{ __('Position') }}</label>
                                                    <select disabled wire:model="position" class="form-select"
                                                        required aria-label="Default select example">
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
                                                    <textarea disabled wire:model="description" id="reason" class="form-control" placeholder="Note..."
                                                        rows="4" required></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="salary_rate">{{ __('Salary Rate') }}</label>
                                                    <input disabled wire:model="salary_rate"  id="salary_rate"
                                                        type="number" class="form-control" name="salary_rate"
                                                        required autofocus>
                                                    
                                                </div>
                                                <div class="col form-group">
                                                    <label for="status">{{ __('Status') }}</label>
                                                    <select disabled wire:model="status" class="form-select" required
                                                        aria-label="Default select example">
                                                        <option selected>Status</option>
                                                        <option value="Hired">Hired</option>
                                                        <option value="Contractual">Contractual</option>
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="start_date">{{ __('Start Date') }}</label>
                                                    <input disabled wire:model="start_date" type="date"
                                                        class="form-control" id="start_date" required>
                                                    
                                                </div>
                                                <div class="col form-group">
                                                    <label for="end_date">{{ __('End Date') }}</label>
                                                    <input disabled  wire:model="end_date" type="date"
                                                        class="form-control" id="end_date">
                                                   
                                                </div>
                                                <a href="{{route('user.profile.edit')}}" type="button" class="btn btn-primary ml-3 mt-3"
                                                    id="editButton">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>