<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name' => ['required', 'string', 'min:1', 'max:128'],
			'description'  => ['nullable', 'string', 'min:4', 'max:512'],
			'dueTime' => ['nullable', 'date'],
			'reminder' => ['nullable'],
			'group_id' => ['required', 'exists:groups,id'],
			'priority_id' => ['required', 'exists:priorities,id']
		];
	}
}
