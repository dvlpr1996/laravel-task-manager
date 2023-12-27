<?php

namespace App\View\Components\task;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class CompletedTasks extends Component
{
    public $completedTasks;

    public function __construct(Request $request)
    {
        $this->completedTasks = Task::where('user_id', auth()->user()->id)
        ->done()->sort($request->all())->paginate(PAGINATION_NUMBER);
    }

    public function render()
    {
        return view('components.task.completed-tasks');
    }
}
