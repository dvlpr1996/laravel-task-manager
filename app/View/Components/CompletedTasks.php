<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CompletedTasks extends Component
{
	public $completedTasks;
	public function __construct()
	{
		$this->completedTasks = auth()->user()->tasks()->where('status','1')->paginate(10);
	}

    public function render()
    {
        return view('components.completed-tasks');
    }
}
