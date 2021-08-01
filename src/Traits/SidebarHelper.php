<?php

namespace Pratiksh\Adminetic\Traits;

use Illuminate\Support\Str;

trait SidebarHelper
{
    public function indexCreateChildren($route, $class)
    {
        $name = Str::ucfirst($route);
        $plural = Str::plural($name);

        $children = [
            [
                'type' => 'submenu',
                'name' => 'All '.$plural,
                'is_active' => request()->routeIs($route.'.index') ? 'active' : '',
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
                'name' => 'Create '.$name,
                'is_active' => request()->routeIs($route.'.create') ? 'active' : '',
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
}
