<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;

class PriorityController extends Controller
{
    public function index(Priority $priority)
    {
        $tasks = Task::where('user_id', auth()->user()->id)->undone()->where('priority_id', $priority->id)->paginate(PAGINATION_NUMBER);

        return view('priorities', compact('tasks'));
    }
}
