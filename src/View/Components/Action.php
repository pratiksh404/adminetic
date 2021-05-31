<?php

namespace Pratiksh\Adminetic\View\Components;

use Illuminate\View\Component;

class Action extends Component
{
    public $model;

    public $route;

    public $show;

    public $edit;

    public $delete;

    public $deleteCondition;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $route, $show = true, $edit = true, $delete = true, $deleteCondition = false)
    {
        $this->model = $model;
        $this->route = $route;
        $this->show = $show;
        $this->edit = $edit;
        $this->delete = $delete;
        $this->deleteCondition = $deleteCondition;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminetic::components.action');
    }
}
