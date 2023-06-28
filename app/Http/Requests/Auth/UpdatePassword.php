<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePassword extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'oldPassword' => $this->passwordRule,
            'newPassword' => array_merge(
                $this->passwordRule,
                ['confirmed', Password::defaults()]
            )
        ];
    }
}
