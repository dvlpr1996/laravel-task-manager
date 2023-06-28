<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:1',
                'string',
                'max:128',
                'required',
                'regex:/^[a-zA-Z0-9-_]/i'
            ],
            'user_id' => ['exists:users,id'],
        ];
    }
}
