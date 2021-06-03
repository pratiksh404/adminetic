<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Pratiksh\Adminetic\Contracts\ProfileRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\ProfileRequest;
use Pratiksh\Adminetic\Models\Admin\Profile;

class ProfileController extends Controller
{
    protected $profileRepositoryInterface;

    public function __construct(ProfileRepositoryInterface $profileRepositoryInterface)
    {
        $this->profileRepositoryInterface = $profileRepositoryInterface;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('adminetic::admin.profile.show', $this->profileRepositoryInterface->showProfile($profile));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('adminetic::admin.profile.edit', $this->profileRepositoryInterface->editProfile($profile));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\ProfileRequest  $request
     * @param  \Pratiksh\Adminetic\Models\Admin\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $this->profileRepositoryInterface->updateProfile($request, $profile);

        return redirect(adminEditRoute('profile', $profile->id))->withInfo('Profile Updated Sucessfully');
    }
}
