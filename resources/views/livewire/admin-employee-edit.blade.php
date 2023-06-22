<form wire:submit.prevent="updateProfile" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-12">
                    <div class="">
                        <h5 class="fw-bold">{{ __('Personal Profile') }}</h5>
                    </div>

                    <hr>
                    <div class="row gap-3">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <img  src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Preview"
                                    class="img-thumbnail" style="width: 250px; height: 250px;">
                            </div>

                            <div class="mb-3">
                                <label for="profileImage" class="form-label">Profile Image:</label>
                                <div class="col-10">
                                    <input wire:model="profile_picture" type="file" class="form-control bg-secondary text-white" id="profileImage" name="profileImage">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="lastName">{{ __('Last Name') }}</label>
                                <input wire:model="last_name" type="text" name="last_name"
                                    class="form-control" required autofocus>
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col form-group">
                                <label for="firstName">{{ __('First Name') }}</label>
                                <input  wire:model="first_name" type="text" name="first_name"
                                    class="form-control" required>
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="middleName">{{ __('Middle Name') }}</label>
                                <input  wire:model="middle_name" type="text" name="middle_name"
                                    class="form-control" required>
                                @error('middle_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="gender">{{ __('Gender') }}</label>
                                <select  class="form-select" aria-label="Default select example"
                                    wire:model="gender" required>
                                    <option selected>Male</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col form-group">
                                <label for="birth_date">{{ __('Birthdate') }}</label>
                                <input  wire:model="birth_date" type="date" class="form-control"
                                    id="birth_date" required>
                                @error('birth_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col form-group">
                                <label for="civilStatus">{{ __('Civil Status') }}</label>
                                <select  wire:model="civil_status" class="form-select"
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
                                <input  id="number" type="number" wire:model="number" class="form-control "
                                    name="number" required autocomplete="number">
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input  wire:model="email"disabled ="email" type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input  wire:model="address" type="text" name="address" class="form-control"
                                    required>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="tin">{{ __('TIN') }}</label>
                                <input  id="tin" type="number" wire:model="tin" class="form-control "
                                    name="tin" required autofocus>
                                @error('tin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col form-group">
                                <label for="sss">{{ __('SSS') }}</label>
                                <input  id="sss" type="number" wire:model="sss" class="form-control "
                                    name="sss" required autofocus>
                                @error('sss')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="philhealth">{{ __('Phil-Health') }}</label>
                                <input  id="philhealth" type="number" wire:model="philhealth"
                                    class="form-control " name="philhealth" required autofocus>
                                @error('sphilhealthss')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="pagibig">{{ __('PAGIBIG') }}</label>
                                <input  id="pagibig" type="number" wire:model="pagibig"
                                    class="form-control " name="pagibig" required autofocus>
                                @error('pagibig')
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
                                <input  id="contact_name" type="text" class="form-control"
                                    name="contact_name" wire:model="contact_name" required autofocus>
                                @error('contact_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="contact_number">{{ __(' Number') }}</label>
                                <input  id="contact_number" type="number" class="form-control"
                                    name="contact_number" wire:model="contact_number" required autofocus>
                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <div class="col form-group">
                                    <label for="contact_relationship">{{ __('Relationship') }}</label>
                                    <input  id="contact_relationship" type="text" class="form-control"
                                        name="contact_relationship" wire:model="contact_relationship" required
                                        autofocus>
                                    @error('contact_relationship')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

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
                                                    <select  wire:model="department" class="form-select"
                                                        required aria-label="Default select example">
                                                        <option selected>Department</option>
                                                        <option value="IT">IT</option>
                                                        <option value="softwareEngineer">Software Engineer</option>
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="position">{{ __('Position') }}</label>
                                                    <select  wire:model="position" class="form-select"
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
                                                    <textarea  wire:model="description" id="reason" class="form-control" placeholder="Note..."
                                                        rows="4" required></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="salary_rate">{{ __('Salary Rate') }}</label>
                                                    <input wire:model="salary_rate"  id="salary_rate"
                                                        type="number" class="form-control" name="salary_rate"
                                                        required autofocus>
                                                    @error('salary_rate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col form-group">
                                                    <label for="status">{{ __('Status') }}</label>
                                                    <select  wire:model="status" class="form-select" required
                                                        aria-label="Default select example">
                                                        <option selected>Status</option>
                                                        <option value="Hired">Hired</option>
                                                        <option value="Contractual">Contractual</option>
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="start_date">{{ __('Start Date') }}</label>
                                                    <input  wire:model="start_date" type="date"
                                                        class="form-control" id="start_date" required>
                                                    @error('start_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col form-group">
                                                    <label for="end_date">{{ __('End Date') }}</label>
                                                    <input  wire:model="end_date" type="date"
                                                        class="form-control" id="end_date" >
                                                    @error('end_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary ml-3 mt-3"
                                                    id="editButton">Save</button>
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