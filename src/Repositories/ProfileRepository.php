<?php

namespace Pratiksh\Adminetic\Repositories;

use Illuminate\Support\Facades\Http;
use Pratiksh\Adminetic\Contracts\ProfileRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\ProfileRequest;
use Pratiksh\Adminetic\Models\Admin\Profile;

class ProfileRepository implements ProfileRepositoryInterface
{
    // Show Profile
    public function showProfile(Profile $profile)
    {
        $user = $profile->user;

        return compact('user', 'profile');
    }

    // Edit Profile
    public function editProfile(Profile $profile)
    {
        $countries = $this->getCountries();
        $user = $profile->user;

        return compact('profile', 'countries', 'user');
    }

    // Update Profile
    public function updateProfile(ProfileRequest $request, Profile $profile)
    {
        $profile->update($request->validated());
        if ($request->profile_pic) {
            $this->uploadProfile($profile);
        }
    }

    protected function uploadProfile($profile)
    {
        $profile_pic = [
            'storage' => 'admin/profile/'.isset($profile->user->name) ? str_replace(' ', '_', strtolower($profile->user->name)) : '',
            'width' => '222',
            'height' => '222',
            'quality' => '70',
            'thumbnails' => [
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '64',
                    'thumbnail-height' => '64',
                    'thumbnail-quality' => '40',
                ],
            ],
        ];
        $profile->makeThumbnail('profile_pic', $profile_pic);
    }

    protected function getCountries()
    {
        $countries = json_decode(Http::get('https://restcountries.eu/rest/v2/all'));

        return $countries;
    }
}
