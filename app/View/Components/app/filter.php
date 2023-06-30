<?php

namespace App\View\Components\app;

use Illuminate\View\Component;

class filter extends Component
{
    public function __construct()
    {

    }

    public function render()
    {
        return view('components.app.filter');
    }
}
