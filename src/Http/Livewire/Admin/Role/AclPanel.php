<?php

namespace Pratiksh\Adminetic\Http\Livewire\Admin\Role;

use Livewire\Component;
use Pratiksh\Adminetic\Models\Admin\Permission;
use Pratiksh\Adminetic\Models\Admin\Role;

class AclPanel extends Component
{
    public $role;
    public $permissions;
    public $remaining_models;
    public $all_models;
    public $role_models;
    public $model_name;

    public $listeners = ['permission_deleted' => 'permissionDeleted'];

    public function mount(Role $role)
    {
        $this->setACLPanel($role);
    }

    public function permissionDeleted()
    {
        $this->setACLPanel($this->role);
    }

    public function makeModuleACL()
    {
        $this->validate([
            'model_name' => 'required|max:30',
        ]);

        Permission::create([
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'role_id' => $this->role->id,
            'model' => $this->model_name,
        ]);
        $this->permissions = Permission::where('role_id', $this->role->id)->get();

        $this->emit('make_module_acl_success');
    }

    public function render()
    {
        return view('adminetic::livewire.admin.role.acl-panel');
    }

    private function setACLPanel(Role $role)
    {
        $this->role = $role;
        $this->permissions = $role->permissions;
        $this->all_models = getAllModelNames(app_path('Models'));
        $this->role_models = $role->permissions->pluck('model')->toArray();
        $this->remaining_models = array_diff($this->all_models, $this->role_models ?? []);
    }
}
