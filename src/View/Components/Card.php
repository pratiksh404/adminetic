<?php

namespace Pratiksh\Adminetic\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;

    public $icon;

    public $bg_color;

    public $card_footer_enabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $icon = null, $bg_color = null, $card_footer_enabled = false)
    {
        //
        $this->title = $title;
        $this->icon = $icon;
        $this->bg_color = $bg_color;
        $this->card_footer_enabled = $card_footer_enabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminetic::components.card');
    }
}
