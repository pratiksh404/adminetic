<?php

namespace Pratiksh\Adminetic\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class IndexPage extends Component
{
    public $name;
    public $plural_name;
    public $property;
    public $route;
    public $class;
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $route, $property = '', $icon = null)
    {
        $this->name = Str::ucfirst($name);
        $this->plural_name = Str::plural(Str::ucfirst($name));
        $this->property = $property;
        $this->route = $route ?? Str::plural($name);
        $this->class = $this->makeDynamicClass($this->name);
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('adminetic::components.index-page');
    }

    protected function makeDynamicClass($name)
    {
        if ($name == 'User') {
            $className = 'App\\Models\\'.Str::ucfirst($name);
        } elseif ($name == 'Permission' || $name == 'Preference' || $name == 'Profile' || $name == 'Role' || $name == 'Setting') {
            $className = 'Pratiksh\\Adminetic\\Models\\Admin\\'.Str::ucfirst($name);
        } else {
            $className = 'App\\Models\\Admin\\'.Str::ucfirst($name);
        }

        return new  $className;
    }
}
