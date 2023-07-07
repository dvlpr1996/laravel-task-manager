<?php

namespace App\View\Components\task;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class TomorrowTasks extends Component
{
    public $tomorrowTasks;

    public function __construct(Request $request)
    {
        $this->tomorrowTasks = Task::authUser()->sort($request->all())->unDone()->where('due_date', Carbon::tomorrow())
            ->paginate(10);
    }

    public function render()
    {
        return view('components.task.tomorrow-tasks');
    }
}
