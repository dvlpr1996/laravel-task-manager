<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\Trait\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    use RequestTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => array_merge(['required'], $this->taskNameRule),
            'description' => $this->taskDescriptionRule,
            'due_date' => ['nullable', 'date'],
            'reminder' => ['nullable'],
            'group_id' => ['required', 'exists:groups,id'],
            'priority_id' => ['required', 'exists:priorities,id'],
        ];
    }
}
