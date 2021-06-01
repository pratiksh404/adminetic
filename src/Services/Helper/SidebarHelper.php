<?php

namespace Pratiksh\Adminetic\Services\Helper;

use Illuminate\Support\Str;

class SidebarHelper
{
    protected function indexCreateChildren($route, $class)
    {
        $name = Str::ucfirst($route);
        $plural = Str::plural($name);

        $children =  [
            [
                'type' => 'submenu',
                'name' => 'All ' . $plural,
                'is_active' => request()->routeIs($route . '.index') ? 'active' : '',
                'link' => adminRedirectRoute($route),
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', $class)
                    ]
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
                        'condition' => auth()->user()->can('create', $class)
                    ]
                ],
            ]
        ];
        return $children;
    }
}
