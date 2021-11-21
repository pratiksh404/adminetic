<?php

namespace Pratiksh\Adminetic\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class ShowPage extends Component
{
    public $name;

    public $route;

    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $route, $model)
    {
        $this->name = Str::ucfirst($name);
        $this->route = $route ?? Str::plural(str_replace(' ', '_', $name));
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminetic::components.show-page');
    }
}
