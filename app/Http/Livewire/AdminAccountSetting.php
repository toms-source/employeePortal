<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminAccountSetting extends Component
{

    public $company_email;
    public $old_password;
    public $new_password;
    public $confirm_password;
    public $role;


    public function mount()
    {
        $data = User::find( Auth::user()->id);

        $this->company_email = $data->company_email;
        $this->role = $data->role;
    }

    public function updateSetting()
    {
        $data = User::find(Auth::user()->id);

        // Validate the password fields
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|same:confirm_password',
        ]);

        // Check if the old password matches the current password
        if (!Hash::check($this->old_password, $data->password)) {
            $this->addError('old_password', 'The old password is incorrect.');
            return;
        }

        // Update the password
        $data->password = Hash::make($this->new_password);
        $data->save();

        // Clear the password fields
        $this->old_password = '';
        $this->new_password = '';
        $this->confirm_password = '';

        // Show a success message
        session()->flash('message', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin-account-setting');
    }
}
