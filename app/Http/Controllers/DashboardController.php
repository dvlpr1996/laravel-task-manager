<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $unfinishedTasks = Task::authUser()->undone()->paginate(PAGINATION_NUMBER);

        return view('dashboard', compact('unfinishedTasks'));
    }
}
