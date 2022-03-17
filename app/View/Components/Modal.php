<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $pointer;
    public $route;

    public function __construct($pointer, $route)
    {
        $this->pointer = $pointer;
        $this->route = $route;
    }

    public function render()
    {
        return view('components.modal');
    }
}
