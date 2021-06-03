<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Pratiksh\Adminetic\Contracts\PermissionRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\PermissionRequest;
use Pratiksh\Adminetic\Models\Admin\Permission;

class PermissionController extends Controller
{
    protected $permissionRepositoryInterface;

    public function __construct(PermissionRepositoryInterface $permissionRepositoryInterface)
    {
        $this->permissionRepositoryInterface = $permissionRepositoryInterface;
        $this->authorizeResource(Permission::class, 'permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminetic::admin.permission.index', $this->permissionRepositoryInterface->indexPermission());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminetic::admin.permission.create', $this->permissionRepositoryInterface->createPermission());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $this->permissionRepositoryInterface->storePermission($request);

        return redirect(adminRedirectRoute('permission'))->withSuccess('Permission Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('adminetic::admin.permission.show', $this->permissionRepositoryInterface->showPermission($permission));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('adminetic::admin.permission.edit', $this->permissionRepositoryInterface->editPermission($permission));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\PermissionRequest  $request
     * @param  \Pratiksh\Adminetic\Models\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $this->permissionRepositoryInterface->updatePermission($request, $permission);

        return redirect(adminRedirectRoute('permission'))->withInfo('Permission Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $this->permissionRepositoryInterface->destroyPermission($permission);

        return redirect(adminRedirectRoute('permission'))->withFail('Permission Deleted Successfully.');
    }
}
