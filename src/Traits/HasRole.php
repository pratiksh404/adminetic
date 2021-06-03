<?php

namespace Pratiksh\Adminetic\Traits;

use Pratiksh\Adminetic\Models\Admin\Role;

trait HasRole
{
    // User Belongs To Many Roles
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimeStamps();
    }

    // Check is user has given role
    public function hasRole($role)
    {
        return $this->roles->where('name', trim($role))->count() == 1 || $this->roles->where('name', 'superuser')->count() == 1;
    }

    // Check if user is superadmin
    public function isSuperAdmin()
    {
        $roles = $this->roles->pluck('name')->toArray();

        return in_array('superadmin', $roles);
    }

    // Check BREAD Access
    public function userCanDo($model, $bread)
    {
        /*   $permissions = $this->permissions->whereIn('role_id', $this->roles->pluck('id')->toArray())->where('model', trim($model))->get([$bread]); */
        $can = [];
        foreach ($this->roles as $role) {
            $permissions = $role->permissions->whereIn('role_id', $role->id)->whereIn('model', trim($model))->pluck([$bread]);
            if ($permissions) {
                foreach ($permissions as $permission) {
                    $can[] = $permission;
                }
            }
        }

        return in_array(1, $can);
    }
}
