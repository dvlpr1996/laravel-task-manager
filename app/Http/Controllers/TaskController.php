<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
	public function store(TaskRequest $request)
	{
		if (!$request->has('reminder'))
			$request->reminder = 0;

		$task = auth()->user()->tasks()->create($request->all());

		if (!$task) abort(500, 'Error');

		return redirect()->route('inbox.index')
			->with('taskSuccessCreated', 'Your Task Successfully Created');
	}
}
