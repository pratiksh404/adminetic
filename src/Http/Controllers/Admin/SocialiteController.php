<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Pratiksh\Adminetic\Models\Admin\Preference;
use Pratiksh\Adminetic\Models\Admin\Role;

class SocialiteController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function githubRedirect()
    {
        return $this->redirectSocialite('github');
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function facebookRedirect()
    {
        return $this->redirectSocialite('facebook');
    }

    public function google()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function googleRedirect()
    {
        return $this->redirectSocialite('google');
    }

    private function redirectSocialite($driver)
    {
        $socialiteuser = Socialite::driver($driver)->stateless()->user();

        $user = User::where('email', $socialiteuser->email)->first();

        if (! isset($user)) {
            $user = User::create([
                'name' => $socialiteuser->name,
                'email' => $socialiteuser->email,
                'password' => Hash::make(Str::random(24)),
            ]);
            // Assigning Default Role to New User
            $default_user_role = config('adminetic.default_user_role', 'user');
            $default_user_role_level = config('adminetic.default_user_role_level', 1);
            $role = Role::where('name', $default_user_role)->first();
            if ($role) {
                $user->roles()->attach($role);
            } else {
                Role::create([
                    'name' => $default_user_role,
                    'description' => 'Default role for newly registered user.',
                    'level' => $default_user_role_level,
                ]);
            }
            // Creating Profile
            $user->profile()->create([
                'username' => $socialiteuser->user->nickname ?? 'N/A',
                'address' => $socialiteuser->location ?? 'N/A',
                'profile_pic' => $socialiteuser->getAvatar(),
            ]);

            // Creating Preference
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
            Auth::login($user, true);

            return redirect(adminRedirectRoute(config('adminetic.oauth_redirect_route_name', 'dashboard')));
        } else {
            Auth::login($user, true);

            return redirect(adminRedirectRoute(config('adminetic.oauth_redirect_route_name', 'dashboard')));
        }
    }
}
