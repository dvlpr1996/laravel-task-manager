<?php

namespace App\Rules;

use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class UniqueGroupName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $existingGroup = Group::where('name', Str::slug($value))
            ->where('user_id', auth()->id())
            ->first();

        return !$existingGroup;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the group name exists';
    }
}
