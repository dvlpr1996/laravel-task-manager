<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{
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
}
