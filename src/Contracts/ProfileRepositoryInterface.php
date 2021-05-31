<?php

namespace Pratiksh\Adminetic\Contracts;

use Pratiksh\Adminetic\Models\Admin\Profile;
use Pratiksh\Adminetic\Http\Requests\ProfileRequest;

interface ProfileRepositoryInterface
{
    public function showProfile(Profile $profile);

    public function editProfile(Profile $profile);

    public function updateProfile(ProfileRequest $request, Profile $profile);
}
