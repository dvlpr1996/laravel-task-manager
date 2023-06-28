<?php

namespace App\Http\Requests\Trait;

trait RequestTrait
{
    protected array $emailRule = [
        'email',
        'string',
        'max:255',
        'required',
        'regex:/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/i',
    ];

    protected array $passwordRule = [
        'required', 'string', 'min:6', 'max:256'
    ];

    protected array $taskNameRule = [
        'string', 'min:1', 'max:128', 'regex:/^[a-zA-Z0-9-_]/i'
    ];

    protected array $taskDescriptionRule = [
        'nullable', 'string', 'min:4', 'max:512', 'regex:/^[a-zA-Z0-9-_]/i'
    ];
}
