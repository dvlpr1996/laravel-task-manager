<?php

namespace App\View\Components\task;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Validation\ValidationException;

class CompletedTasks extends Component
{
    public $completedTasks;

    public function __construct(Request $request)
    {
        $this->completedTasks = $this->getCompletedTask($request);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'sort' => 'nullable|string|regex:/^[a-zA-a]/i|in:ascending,descending,dueDate',
        ]);
    }

    private function getCompletedTask(Request $request)
    {
        // fix: ValidationException msg
        try {
            $this->validateRequest($request);
        } catch (ValidationException $e) {
        }
        $sortType = request('sort', 'ascending');
        return Task::authUser()->done()->sort([$sortType])->paginate(PAGINATION_NUMBER);
    }

    public function render()
    {
        return view('components.task.completed-tasks');
    }
}
