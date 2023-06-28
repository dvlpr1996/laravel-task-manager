<?php

namespace App\Models\Trait;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ModelTrait
{
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value = date('y-M-d', strtotime($value)) ?? '-'
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value = date('y-M-d', strtotime($value)) ?? '-'
        );
    }
}
