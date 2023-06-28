<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rule;
use App\Http\Requests\Trait\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    use RequestTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fname' => ['nullable', 'alpha', 'max:16'],
            'lname' => ['nullable', 'alpha', 'max:32'],
            'email' => array_merge(
                $this->emailRule,
                [Rule::unique('users', 'email')->ignore($this->user()->id)]
            ),
        ];
    }
}
