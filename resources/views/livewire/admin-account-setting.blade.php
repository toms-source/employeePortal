<form method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="">
                        <h5 class="fw-bold">{{ __('Personal Profile') }}</h5>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <img src="{{ $profileImage ?? '/path/to/default-image.jpg' }}" alt="Profile Preview" class="img-thumbnail" style="width: 250px; height: 250px;">
                            </div>

                            <div class="mb-3">
                                <label for="profileImage" class="form-label">Profile Image:</label>
                                <div class="col-10">
                                    <input type="file" class="form-control bg-secondary text-white" id="profileImage" name="profileImage">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="email" class="form-label">Company Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Access</label>
                                <input type="text" class="form-control" id="role" name="role" required>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Old Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                @error('newPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                @error('confirmPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </div>
            </div>
</form>
