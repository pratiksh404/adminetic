<?php

namespace Pratiksh\Adminetic\Contracts;

use Pratiksh\Adminetic\Http\Requests\PermissionRequest;
use Pratiksh\Adminetic\Models\Admin\Permission;

interface PermissionRepositoryInterface
{
    public function indexPermission();

    public function createPermission();

    public function storePermission(PermissionRequest $request);

    public function showPermission(Permission $Permission);

    public function editPermission(Permission $Permission);

    public function updatePermission(PermissionRequest $request, Permission $Permission);

    public function destroyPermission(Permission $Permission);
}
