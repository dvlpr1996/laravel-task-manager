<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name' => ['nullable', 'string', 'min:1', 'max:128'],
			'description'  => ['nullable', 'string', 'min:4', 'max:512'],
			'due_date' => ['nullable', 'date'],
			'reminder' => ['nullable'],
			'group_id' => ['nullable', 'exists:groups,id'],
			'priority_id' => ['nullable', 'exists:priorities,id']
		];
	}
}
