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
        $this->tomorrowTasks = Task::where('user_id', auth()->user()->id)->sort($request->all())->unDone()->tomorrow()->paginate(PAGINATION_NUMBER);
    }

    public function render()
    {
        return view('components.task.tomorrow-tasks');
    }
}
