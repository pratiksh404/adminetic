<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Pratiksh\Adminetic\Contracts\UserRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminetic::admin.user.index', $this->userRepositoryInterface->userIndex());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminetic::admin.user.create', $this->userRepositoryInterface->userCreate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->userRepositoryInterface->userStore($request);

        return redirect(adminRedirectRoute('user'))->withSuccess('User Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('adminetic::admin.profile.show', $this->userRepositoryInterface->userShow($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('adminetic::admin.user.edit', $this->userRepositoryInterface->userEdit($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->userRepositoryInterface->userUpdate($request, $user);

        return request()->has('from_profile') ? redirect(adminEditRoute('profile', $user->profile->id))->withInfo('User Updated Sucessfully') : redirect(adminRedirectRoute('user'))->withInfo('User Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userRepositoryInterface->userDestroy($user);

        return redirect(adminRedirectRoute('user'))->withFail('User Deleted Sucessfully');
    }
}
