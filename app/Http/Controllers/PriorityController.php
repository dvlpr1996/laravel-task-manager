<?php

namespace App\Http\Controllers;

use App\Models\Priority;

class PriorityController extends Controller
{
	public function index(Priority $priority)
	{
		$tasks = auth()->user()->tasks()->where('priority_id', $priority->id)->paginate(10);
		return view('priorities', compact('tasks'));
	}
}
