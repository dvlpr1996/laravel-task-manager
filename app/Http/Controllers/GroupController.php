<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{
	public function index(Group $group)
	{
		$tasks = auth()->user()->tasks()->where('group_id', $group->id)->get();

		if (!$tasks) abort(500, 'Error');

		return view('lists', compact('tasks'));
	}

	public function destroy(Group $group)
	{
		$group = Group::find($group->id)->delete();

		if (!$group) abort(500, 'Error');

		return back()->with(__('app.listSuccessDeleted'));
	}

	public function update(GroupRequest $request, Group $group)
	{
		$group = $group->update([
			'name' => $request->name,
			'user_id' => auth()->user()->id,
		]);

		if (!$group) abort(500, 'Error');

		return back()->with(__('app.listSuccessUpdated'));
	}

	public function store(GroupRequest $request)
	{
		$group = auth()->user()->groups()->create($request->all());

		if (!$group) abort(500, 'Error');

		return back()->with(__('app.listSuccessCreated'));
	}
}
