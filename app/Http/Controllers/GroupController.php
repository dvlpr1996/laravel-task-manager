<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{
	public function index(Group $group)
	{
		$tasks = auth()->user()->tasks()->where('group_id', $group->id)->where('status', '!=', 1)
		->get();
		return view('lists', compact('tasks', 'group'));
	}

	public function destroy(Group $group)
	{
		$this->authorize('delete', $group);
		Group::findOrFail($group->id)->delete();
		return back()->with(__('app.listSuccessDeleted'));
	}

	public function update(GroupRequest $request, Group $group)
	{
		$this->authorize('update', $group);

		$group = $group->update([
			'name' => $request->name,
			'user_id' => auth()->user()->id,
		]);

		if (!$group) abort(404);

		return back()->with(__('app.listSuccessUpdated'));
	}

	public function store(GroupRequest $request)
	{
		$this->authorize('create', Group::class);

		$group = auth()->user()->groups()->create($request->all());

		if (!$group) abort(404);

		return back()->with(__('app.listSuccessCreated'));
	}
}
