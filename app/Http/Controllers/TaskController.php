<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
	public function index(Request $request)
	{
		$allTasks = Task::authUser()->sort($request->all())->paginate(10)->withQueryString();
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

		if ($request->has('reminder') && $request->reminder == 'on')
			$request->reminder = 'on';

		$task = $task->update([
			'name' => $request->name,
			'user_id' => auth()->user()->id,
			'description' => $request->description,
			'due_date' => $request->due_date,
			'reminder' => $request->reminder,
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

		if ($reminderStatus === 'off')
			$task->update(['reminder' => 'on']);

		if ($reminderStatus === 'on')
			$task->update(['reminder' => 'off']);

		return back();
	}
}
