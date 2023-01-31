<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Group;
use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{
	public function index(Group $group)
	{
		$tasks = Task::authUser()->undone()->where('group_id', $group->id)->get();
		return view('lists', compact('tasks', 'group'));
	}

	public function destroy(Group $group)
	{
		$this->authorize('delete', $group);
		Group::findOrFail($group->id)->delete();
		return back()->withToastSuccess(__('app.listSuccessDeleted'));
	}

	public function update(GroupRequest $request, Group $group)
	{
		$this->authorize('update', $group);

		$group = $group->update([
			'name' => $request->name,
			'user_id' => auth()->user()->id,
		]);

		if (!$group) abort(404);

		return back()->withToastSuccess(__('app.listSuccessUpdated'));
	}

	public function store(GroupRequest $request)
	{
		$this->authorize('create', Group::class);

		$group = auth()->user()->groups()->create($request->all());

		if (!$group) abort(404);

		return back()->withToastSuccess(__('app.listSuccessCreated'));
	}
}
