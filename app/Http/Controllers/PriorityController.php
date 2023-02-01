<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;

class PriorityController extends Controller
{
    public function index(Priority $priority)
    {
        $tasks = Task::authUser()->undone()->where('priority_id', $priority->id)->paginate(10);

        return view('priorities', compact('tasks'));
    }
}
