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
		$this->authorize('create', Task::class);

		if (!$request->has('reminder'))
			$request->reminder = 0;

		$task = auth()->user()->tasks()->create($request->all());

		if (!$task) abort(404);

		return redirect()->route('inbox.index')->with(__('app.taskSuccessCreated'));
	}

	public function destroy(Task $task)
	{
		$this->authorize('delete', $task);
		$task = Task::findOrFail($task->id)->delete();
		return back()->with(__('app.taskSuccessDeleted'));
	}

	public function update(TaskUpdateRequest $request, Task $task)
	{
		$this->authorize('update', $task);
		// ($request->has('reminder')) ? $reminder = $request->reminder : $reminder = Task::find($task->id)->reminder;

		$task = $task->update([
			'name' => $request->name,
			'user_id' => auth()->user()->id,
			'description' => $request->description,
			'due_date' => $request->due_date,
			'reminder' => 1,
			'group_id' => $request->group_id,
			'priority_id' => $request->priority_id
		]);

		if (!$task) abort(404);

		return back()->with(__('app.taskSuccessUpdated'));
	}

	public function done(Task $task)
	{
		$task = $task->update(['status' => 1]);
		if (!$task) abort(404);
		return back();
	}

	public function toggleReminder(Task $task)
	{
		$reminderStatus = $task->reminder;

		if ($reminderStatus === 'no')
			$task->update(['reminder' => 1]);

		if ($reminderStatus === 'yes')
			$task->update(['reminder' => 0]);

		return back();
	}
}
