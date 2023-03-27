<?php

namespace Pratiksh\Adminetic\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Pratiksh\Adminetic\Contracts\UserRepositoryInterface;
use Pratiksh\Adminetic\Events\UserHasBeenRegistered;
use Pratiksh\Adminetic\Http\Requests\UserRequest;
use Pratiksh\Adminetic\Models\Admin\Preference;
use Pratiksh\Adminetic\Models\Admin\Role;

class UserRepository implements UserRepositoryInterface
{
    // User Index
    public function userIndex()
    {
        return [];
    }

    // User Create
    public function userCreate()
    {
        $roles = Cache::get('roles', Role::all(['id', 'name']));

        return compact('roles');
    }

    // User Store
    public function userStore(UserRequest $request)
    {
        // Validating Request
        $request->validated();
        // Creating User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // User Registered Event
        event(new UserHasBeenRegistered($user, $request->password));
        // Asigning Role
        $this->assignRole($user);
        // Creating Profile
        $user->profile()->create();
        // Creating Preference
        $this->attachPreference($user);
    }

    // User Show
    public function userShow(User $user)
    {
        $profile = $user->profile;

        return compact('user', 'profile');
    }

    // User Edit
    public function userEdit(User $user)
    {
        $roles = Cache::get('roles', Role::all(['id', 'name']));

        return compact('user', 'roles');
    }

    public function userUpdate(UserRequest $request, User $user)
    {
        if ($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $user->password,
            ]);
        }
        $this->syncRole($user);
    }

    public function userDestroy(User $user)
    {
        // Deleting Profile
        $user->profile()->delete();
        // Deleting Attached Role
        $user->roles()->detach();
        // Deleting Attached Preference
        $user->preferences()->detach();
        $user->delete();
    }

    public function userEditRoute($user)
    {
        if (Auth::user()->id == $user->id) {
            return view('adminetic::admin.profile.edit', compact('user'));
        } else {
            return view('adminetic::admin.user.edit', $this->userEdit($user));
        }
    }

    public function assignRole($user)
    {
        if (request()->role) {
            $user->roles()->attach(request()->role);
        }
    }

    public function syncRole($user)
    {
        if (request()->role) {
            $role = Role::where('id', request()->role)->first();
            $user->roles()->sync($role);
        }
    }

    public function attachPreference($user)
    {
        $preferences = Preference::all();
        if (isset($preferences)) {
            foreach ($preferences as $preference) {
                if (! isset($preference->roles)) {
                    $user->preferences()->attach($preference->id, [
                        'enabled' => $preference->active,
                    ]);
                } else {
                    if (array_intersect($user->roles->pluck('id')->toArray(), $preference->roles) != null) {
                        $user->preferences()->attach($preference->id, [
                            'enabled' => $preference->active,
                        ]);
                    }
                }
            }
        }
    }
}
