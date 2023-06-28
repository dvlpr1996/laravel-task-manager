<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\Trait\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    use RequestTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => array_merge(['nullable'], $this->taskNameRule),
            'description' => $this->taskDescriptionRule,
            'due_date' => ['nullable', 'date'],
            'reminder' => ['nullable'],
            'group_id' => ['nullable', 'exists:groups,id'],
            'priority_id' => ['nullable', 'exists:priorities,id'],
        ];
    }
}
