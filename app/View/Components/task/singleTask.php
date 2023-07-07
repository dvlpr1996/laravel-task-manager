<?php

namespace App\View\Components\task;

use App\Models\Task;
use Illuminate\View\Component;

class singleTask extends Component
{
    public Task $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('components.task.single-task');
    }
}
