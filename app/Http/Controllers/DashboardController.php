<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $unfinishedTasks = Task::with('group:id,name', 'priority:id,level,icon')->where('user_id', auth()->user()->id)->undone()->paginate(PAGINATION_NUMBER);

        return view('dashboard', compact('unfinishedTasks'));
    }
}
