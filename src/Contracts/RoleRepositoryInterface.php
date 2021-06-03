<?php

namespace Pratiksh\Adminetic\Contracts;

use Pratiksh\Adminetic\Http\Requests\RoleRequest;
use Pratiksh\Adminetic\Models\Admin\Role;

interface RoleRepositoryInterface
{
    public function indexRole();

    public function createRole();

    public function storeRole(RoleRequest $request);

    public function showRole(Role $role);

    public function editRole(Role $role);

    public function updateRole(RoleRequest $request, Role $role);

    public function destroyRole(Role $role);
}
