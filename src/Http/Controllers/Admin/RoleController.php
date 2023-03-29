<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Pratiksh\Adminetic\Contracts\RoleRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\RoleRequest;
use Pratiksh\Adminetic\Models\Admin\Role;

class RoleController extends Controller
{
    protected $roleRepositoryInterface;

    public function __construct(RoleRepositoryInterface $roleRepositoryInterface)
    {
        $this->roleRepositoryInterface = $roleRepositoryInterface;
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminetic::admin.role.index', $this->roleRepositoryInterface->indexRole());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminetic::admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->roleRepositoryInterface->storeRole($request);

        return redirect(adminRedirectRoute('role'))->withSuccess('Role Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('adminetic::admin.role.show', $this->roleRepositoryInterface->showRole($role));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('adminetic::admin.role.edit', $this->roleRepositoryInterface->editRole($role));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\RoleRequest  $request
     * @param  \Pratiksh\Adminetic\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->roleRepositoryInterface->updateRole($request, $role);

        return redirect(adminRedirectRoute('role'))->withInfo('Role Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->roleRepositoryInterface->destroyRole($role);

        return redirect(adminRedirectRoute('role'))->withFail('Role Deleted Successfully.');
    }
}
