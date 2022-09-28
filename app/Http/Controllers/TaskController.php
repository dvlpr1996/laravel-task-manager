<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
	public function index()
	{
		$allTasks = auth()->user()->tasks()->paginate(10);
		return view('inbox', compact('allTasks'));
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

	public function update(TaskUpdateRequest $request, Task $task)
	{

		($request->has('reminder')) ? $reminder = $request->reminder : $reminder = Task::find($task->id)->reminder;

		$task = $task->update([
			'name' => $request->name,
			'user_id' => auth()->user()->id,
			'description' => $request->description,
			'due_date' => $request->due_date,
			'reminder' => $reminder,
			'group_id' => $request->group_id,
			'priority_id' => $request->priority_id
		]);

		if (!$task) abort(500, 'Error');

		return redirect()->route('inbox.index')
			->with('taskSuccessUpdated', 'Your Task Successfully Updated');
	}
}
