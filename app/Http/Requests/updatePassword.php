<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePassword extends FormRequest
{
	public function authorize()
	{
		return false;
	}

	public function rules()
	{
		return [
			'oldPassword' => ['required', 'min:6'],
			'newPassword' => ['required', 'confirmed', 'min:6']
		];
	}
}
