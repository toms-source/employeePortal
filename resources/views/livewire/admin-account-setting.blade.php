<form wire:submit.prevent="updateSetting" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="">
                        <h5 class="fw-bold">{{ __('Personal Profile') }}</h5>
                    </div>

                    <hr>

                    @if (session()->has('message'))
                        <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button wire:model="profile_picture" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <img  src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Preview"
                                    class="img-thumbnail" style="width: 250px; height: 250px;">
                            </div>
                            <div class="mb-3 ml-2">
                                <label for="profileImage" class="form-label">Profile Picture</label>
                                
                            </div>

                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="company_email" class="form-label">Company Email:</label>
                                <input disabled wire:model="company_email" type="email" class="form-control" id="company_email" name="company_email" required>
                                @error('company_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Access</label>
                                <input disabled wire:model="role"type="text" class="form-control" id="role" name="role" required>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password:</label>
                                <input required wire:model="old_password" type="password" class="form-control" id="old_password" name="old_password" >
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input required wire:model="new_password" type="password" class="form-control" id="new_password" name="new_password" >
                                @error('newPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input required wire:model="confirm_password" type="password" class="form-control" id="confirm_password" name="confirmPconfirm_passwordassword" >
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </div>
            </div>
</form>
