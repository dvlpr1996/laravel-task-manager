<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fname' => ['nullable', 'string', 'max:16'],
            'lname' => ['nullable', 'string', 'max:32'],
            'email' => ['required', 'string', 'email',
                'max:255', Rule::unique('users', 'email')->ignore($this->user()->id)],
        ];
    }
}
