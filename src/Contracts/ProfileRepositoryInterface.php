<?php

namespace Pratiksh\Adminetic\Contracts;

use Pratiksh\Adminetic\Http\Requests\ProfileRequest;
use Pratiksh\Adminetic\Models\Admin\Profile;

interface ProfileRepositoryInterface
{
    public function showProfile(Profile $profile);

    public function editProfile(Profile $profile);

    public function updateProfile(ProfileRequest $request, Profile $profile);
}
