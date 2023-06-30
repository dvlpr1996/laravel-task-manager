<?php

namespace App\View\Components\task;

use Illuminate\View\Component;

class addTask extends Component
{
    public $modalType;

    public function __construct($modalType = '')
    {
        $this->modalType = $modalType;
    }

    public function render()
    {
        return view('components.task.add-task');
    }
}
