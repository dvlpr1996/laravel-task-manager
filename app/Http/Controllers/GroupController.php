<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Group;
use Illuminate\Support\Str;
use App\Http\Requests\Group\GroupRequest;

class GroupController extends Controller
{
    public function index(Group $group)
    {
        $this->authorize('viewAny', $group);

        $tasks = Task::with('group:id,name', 'priority:id,level')->where('user_id', auth()->user()->id)->where('group_id', $group->id)->get();

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

        if (!$group) {
            abort(404);
        }

        return back()->withToastSuccess(__('app.listSuccessUpdated'));
    }

    public function store(GroupRequest $request)
    {
        $this->authorize('create', Group::class);

        $group = auth()->user()->groups()->create([
            'name' => Str::slug($request->name)
        ]);

        if (!$group) {
            abort(404);
        }

        return back()->withToastSuccess(__('app.listSuccessCreated'));
    }
}
