<?php

namespace Pratiksh\Adminetic\Repositories;

use Illuminate\Support\Facades\Cache;
use Pratiksh\Adminetic\Contracts\PermissionRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\PermissionRequest;
use Pratiksh\Adminetic\Models\Admin\Permission;
use Pratiksh\Adminetic\Models\Admin\Role;

class PermissionRepository implements PermissionRepositoryInterface
{
    // Permission Index
    public function indexPermission()
    {
        $permissions = config('adminetic.caching', true)
            ? (Cache::has('permissions') ? Cache::get('permissions') : Cache::rememberForever('permissions', function () {
                return Permission::with('role')->get();
            }))
            : Permission::with('role')->get();

        return compact('permissions');
    }

    // Permission Create
    public function createPermission()
    {
        $roles = Cache::get('roles', Role::all(['id', 'name']));

        return compact('roles');
    }

    // Permission Store
    public function storePermission(PermissionRequest $request)
    {
        Permission::create($request->validated());
    }

    // Permission Show
    public function showPermission(Permission $permission)
    {
        return compact('permission');
    }

    // Permission Edit
    public function editPermission(Permission $permission)
    {
        $roles = Cache::get('roles', Role::all(['id', 'name']));

        return compact('permission', 'roles');
    }

    // Permission Update
    public function updatePermission(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
    }

    // Permission Destroy
    public function destroyPermission(Permission $permission)
    {
        $permission->delete();
    }
}
