<?php

namespace Pratiksh\Adminetic\Http\Livewire\Admin\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditAccount extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function submit()
    {
        $user = $this->user;
        $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|confirmed|min:8|max:30',
        ]);
        if (isset($this->password)) {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        } else {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $user->password,
            ]);
        }
        $this->emit('account_updated');
    }

    public function render()
    {
        return view('adminetic::livewire.admin.profile.edit-account');
    }
}
