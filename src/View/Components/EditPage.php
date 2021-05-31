<?php

namespace Pratiksh\Adminetic\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class EditPage extends Component
{
    public $name;

    public $route;

    public $model;

    public $formclass;

    public $formid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $route, $model, $formclass = null, $formid = null)
    {
        $this->name = Str::ucfirst($name);
        $this->route = $route ?? Str::plural(str_replace(' ', '_', $name));
        $this->model = $model;
        $this->formclass = $formclass;
        $this->formid = $formid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminetic::components.edit-page');
    }
}
