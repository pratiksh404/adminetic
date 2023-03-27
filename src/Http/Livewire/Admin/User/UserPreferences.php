<?php

namespace Pratiksh\Adminetic\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Pratiksh\Adminetic\Models\Admin\Preference;

class UserPreferences extends Component
{
    public $user;

    public $preference;

    public $enabled;

    protected $listeners = ['preference_changed' => 'preferenceChanged'];

    public function mount(User $user, Preference $preference)
    {
        $this->user = $user;
        $this->preference = $preference;
        $this->enabled = $preference->pivot->enabled;
    }

    public function preferenceChanged(User $user, Preference $preference)
    {
        $user->preferences()->updateExistingPivot($preference->id, ['enabled' => ! $this->enabled], false);

        $this->preference = $preference;
        $this->enabled = ! $this->enabled;
    }

    public function render()
    {
        return view('adminetic::livewire.admin.user.user-preferences');
    }
}
