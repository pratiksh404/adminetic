<?php

namespace Pratiksh\Adminetic\View\Components;

use Adminetic;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menus = Adminetic::menus() ?? [];

        return view('adminetic::components.sidebar', compact('menus'));
    }
}
