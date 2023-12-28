<?php

namespace App\Http\Requests\Group;

use App\Rules\UniqueGroupName;
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
                'required',
                'bail',
                'min:1',
                'string',
                'max:128',
                'regex:/^[a-zA-Z0-9-_]/i',
                new UniqueGroupName,
            ],
            'user_id' => ['exists:users,id'],
        ];
    }
}
