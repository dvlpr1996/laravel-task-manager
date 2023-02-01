<?php

namespace App\View\Components;

use Illuminate\View\Component;

class filter extends Component
{
    public $direction;

    public function __construct(string $direction = '')
    {
        $this->direction = $direction;
    }

    public function render()
    {
        return view('components.filter');
    }
}
