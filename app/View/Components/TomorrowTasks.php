<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class TomorrowTasks extends Component
{
	public $tomorrowTasks;
    public function __construct()
    {
        $this->tomorrowTasks =auth()->user()->tasks()->where('status', '!=', '1')
				->where('due_date', Carbon::tomorrow())
				->paginate(10);
    }

    public function render()
    {
        return view('components.tomorrow-tasks');
    }
}
