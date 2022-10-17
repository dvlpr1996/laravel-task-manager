<?php

namespace App\View\Components;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class CompletedTasks extends Component
{
	public $completedTasks;
	public function __construct(Request $request)
	{
		$this->completedTasks = Task::authUser()->done()->sort($request->all())->paginate(10);
	}

	public function render()
	{
		return view('components.completed-tasks');
	}
}
