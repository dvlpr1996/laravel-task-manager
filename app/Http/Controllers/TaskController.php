<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
	public function index()
	{
		$allTasks = auth()->user()->tasks()->get();
		return view('inbox',compact('allTasks'));
	}

	public function store(TaskRequest $request)
	{
		if (!$request->has('reminder'))
			$request->reminder = 0;

		$task = auth()->user()->tasks()->create($request->all());

		if (!$task) abort(500, 'Error');

		return redirect()->route('inbox.index')
			->with('taskSuccessCreated', 'Your Task Successfully Created');
	}

	public function destroy(Task $task)
	{

		$task = Task::find($task->id)->delete();

		if (!$task) abort(500, 'Error');

		return redirect()->route('inbox.index')
			->with('taskSuccessDeleted', 'Your Task Successfully Deleted');
	}
}
