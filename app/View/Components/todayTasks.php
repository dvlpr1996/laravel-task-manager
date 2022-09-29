<?php

namespace App\View\Components;

use Illuminate\View\Component;

class todayTasks extends Component
{
	public $todayTasks;
	public function __construct()
	{
		$this->todayTasks = auth()->user()->tasks()->where('status', '!=' ,'1')
		->where('due_date',date('Y-m-d'))
		->paginate(10);
	}

	public function render()
	{
		return view('components.today-tasks');
	}
}
