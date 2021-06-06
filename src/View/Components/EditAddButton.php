<?php

namespace Pratiksh\Adminetic\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class EditAddButton extends Component
{
    public $model;

    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $name)
    {

        $this->model = $model;
        $this->name = Str::ucfirst($name);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminetic::components.edit.edit-add-button');
    }
}
