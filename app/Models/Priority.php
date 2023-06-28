<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Trait\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Priority extends Model
{
    use HasFactory, ModelTrait;

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    protected function level(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::slug($value)
        );
    }
}
