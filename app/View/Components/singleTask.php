<?php

namespace App\View\Components;

use Illuminate\View\Component;

class singleTask extends Component
{
    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('components.single-task');
    }
}
