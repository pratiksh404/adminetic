<?php

namespace Pratiksh\Adminetic\View\Components;

use Exception;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public function myMenu()
    {
        $myMenu = config('adminetic.myMenu', \App\Services\MyMenu::class);
        if (class_exists($myMenu)) {
            if (method_exists($myMenu, 'myMenu')) {
                $menu = new $myMenu;
                if (is_array($menu->myMenu())) {
                    return $menu->myMenu();
                } else {
                    throw new Exception('myMenu method return type must be an array.');
                }
            } else {
                throw new Exception('myMenu method is not found', 1);
            }
        } else {
            throw new Exception('Given class namespace is not found');
        }
    }

    public function initializeMenu()
    {
        $menus = [
            [
                'type' => 'breaker',
                'name' => 'General',
                'description' => 'Administration Control',
            ],
            [
                'type' => 'link',
                'name' => 'Dashboard',
                'icon' => 'fa fa-home',
                'link' => route('home'),
                'is_active' => request()->routeIs('home') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'and',
                        'condition' => auth()->user()->hasRole('admin'),
                    ],
                ],
            ],
            [
                'type' => 'menu',
                'name' => 'User Management',
                'icon' => 'fa fa-users',
                'is_active' => request()->routeIs('user*') ? 'active' : '',
                'pill' => [
                    'class' => 'badge badge-info badge-air-info',
                    'value' => \App\Models\User::count(),
                ],
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \App\Models\User::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \App\Models\User::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('user', \App\Models\User::class),
            ],
            [
                'type' => 'menu',
                'name' => 'Role',
                'icon' => 'fa fa-black-tie',
                'is_active' => request()->routeIs('role*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \Pratiksh\Adminetic\Models\Admin\Role::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \Pratiksh\Adminetic\Models\Admin\Role::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('role', \Pratiksh\Adminetic\Models\Admin\Role::class),
            ],
            [
                'type' => 'menu',
                'name' => 'Permission',
                'icon' => 'fa fa-check',
                'is_active' => request()->routeIs('permission*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \Pratiksh\Adminetic\Models\Admin\Permission::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \Pratiksh\Adminetic\Models\Admin\Permission::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('permission', \Pratiksh\Adminetic\Models\Admin\Permission::class),
            ],
            [
                'type' => 'menu',
                'name' => 'Setting',
                'icon' => 'fa fa-cog',
                'is_active' => request()->routeIs('setting*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \Pratiksh\Adminetic\Models\Admin\Setting::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \Pratiksh\Adminetic\Models\Admin\Setting::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('setting', \Pratiksh\Adminetic\Models\Admin\Setting::class),
            ],
            [
                'type' => 'menu',
                'name' => 'Preference',
                'icon' => 'fa fa-wrench',
                'is_active' => request()->routeIs('preference*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \Pratiksh\Adminetic\Models\Admin\Preference::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \Pratiksh\Adminetic\Models\Admin\Preference::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('preference', \Pratiksh\Adminetic\Models\Admin\Preference::class),
            ],
            [
                'type' => 'link',
                'name' => 'Activities',
                'icon' => 'fa fa-book',
                'is_active' => request()->routeIs('activity*') ? 'active' : '',
                'link' => adminRedirectRoute('activity'),
                'conditions' => [
                    [
                        'type' => 'and',
                        'condition' => auth()->user()->hasRole('admin'),
                    ],
                ],
            ],
        ];

        return array_merge($menus, $this->myMenu() ?? []);
    }

    protected function indexCreateChildren($route, $class)
    {
        $name = Str::ucfirst($route);
        $plural = Str::plural($name);

        $children = [
            [
                'type' => 'submenu',
                'name' => 'All ' . $plural,
                'is_active' => request()->routeIs($route . '.index') ? 'active' : '',
                'link' => adminRedirectRoute($route),
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', $class),
                    ],
                ],
            ],
            [
                'type' => 'submenu',
                'name' => 'Create ' . $route,
                'is_active' => request()->routeIs($route . '.create') ? 'active' : '',
                'link' => adminCreateRoute($route),
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', $class),
                    ],
                ],
            ],
        ];

        return $children;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menus = $this->initializeMenu();

        return view('adminetic::components.sidebar', compact('menus'));
    }
}
