<?php

namespace Pratiksh\Adminetic\Repositories;

use Illuminate\Support\Facades\Cache;
use Pratiksh\Adminetic\Contracts\RoleRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\RoleRequest;
use Pratiksh\Adminetic\Models\Admin\Role;

class RoleRepository implements RoleRepositoryInterface
{
    // Role Index
    public function indexRole()
    {
        $roles = config('adminetic.caching', true)
            ? (Cache::has('roles') ? Cache::get('roles') : Cache::rememberForever('roles', function () {
                return Role::all();
            }))
            : Role::all();

        return compact('roles');
    }

    // Role Create
    public function createRole()
    {
        //
    }

    // Role Store
    public function storeRole(RoleRequest $request)
    {
        Role::create($request->validated());
    }

    // Role Show
    public function showRole(Role $role)
    {
        return compact('role');
    }

    // Role Edit
    public function editRole(Role $role)
    {
        return compact('role');
    }

    // Role Update
    public function updateRole(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());
    }

    // Role Destroy
    public function destroyRole(Role $role)
    {
        $role->delete();
    }
}
