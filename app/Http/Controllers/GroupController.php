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

		return back()->with('groupSuccessDeleted', 'Your List Successfully Deleted');
	}

	public function update(GroupRequest $request, Group $group)
	{
		$group = $group->update([
			'name' => $request->name,
			'user_id' => auth()->user()->id,
		]);

		if (!$group) abort(500, 'Error');

		return back()->with('listSuccessUpdated', 'Your List Successfully Updated');
	}

	public function store(GroupRequest $request)
	{
		$group = auth()->user()->groups()->create($request->all());

		if (!$group) abort(500, 'Error');

		return back()->with('listSuccessCreated', 'Your List Successfully created');
	}
}
