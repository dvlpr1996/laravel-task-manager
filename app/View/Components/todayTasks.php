<?php

namespace App\View\Components;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class todayTasks extends Component
{
	public $todayTasks;
	public function __construct(Request $request)
	{
		$this->todayTasks = Task::authUser()->unDone()->where('due_date', date('Y-m-d'))->sort($request->all())->paginate(10);
	}

	public function render()
	{
		return view('components.today-tasks');
	}
}
