<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pratiksh\Adminetic\Contracts\RoleRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\RoleRequest;
use Pratiksh\Adminetic\Models\Admin\Permission;
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

    public function assignModulePermission(Role $role)
    {
        // Permission for model existence check
        $permissions = Permission::all(['id', 'model']);
        Permission::create([
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'role_id' => $role->id,
            'model' => request()->model,
        ]);

        return redirect(adminShowRoute('role', $role->id))->withSuccess('Permission create for new module');
    }

    public function detachModulePermssion(Role $role, Permission $permission)
    {
        $permission->delete();

        return redirect(adminShowRoute('role', $role->id))->withSuccess('Permission detached for module');
    }

    public function changeModulePermission(Request $request)
    {
        $permission = Permission::find($request->permission);
        if ($request->type == 1) {
            $permission->update([
                'browse' => $request->flag,
            ]);
        }
        if ($request->type == 2) {
            $permission->update([
                'read' => $request->flag,
            ]);
        }
        if ($request->type == 3) {
            $permission->update([
                'edit' => $request->flag,
            ]);
        }
        if ($request->type == 4) {
            $permission->update([
                'add' => $request->flag,
            ]);
        }
        if ($request->type == 5) {
            $permission->update([
                'delete' => $request->flag,
            ]);
        }

        return json_encode(['statusCode' => 200, 'success' => 'Permission Updated']);
    }
}
