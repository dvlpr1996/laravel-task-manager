<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Trait\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, ModelTrait;

    protected $fillable = [
        'name', 'description', 'due_date', 'reminder', 'status', 'user_id',
        'group_id', 'priority_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value == 0) ? $value = 'undone' : $value = 'done',
            set: fn ($value) => ($value == 'undone') ? $value = 0 : $value = 1
        );
    }

    protected function dueDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::create($value)->toFormattedDateString()
        );
    }

    protected function reminder(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value == 1) ? $value = 'on' : $value = 'off',
            set: fn ($value) => ($value == 'on') ? $value = 1 : $value = 0,
        );
    }

    public function scopeSort(Builder $query, array $params)
    {
        if (isset($params['q']))
            $query->where('name', 'like', '%' . sanitizeQueryStringFiled($params['q']) . '%');

        if (isset($params['sort']) && $params['sort'] == 'ascending')
            $query->orderBy('name', 'asc');

        if (isset($params['sort']) && $params['sort'] == 'descending')
            $query->orderByDesc('name');

        if (isset($params['sort']) && $params['sort'] == 'dueDate')
            $query->orderByDesc('due_date');

        return $query;
    }

    public static function scopeUndone(Builder $query)
    {
        return $query->where('status', '!=', '1');
    }

    public static function scopeDone(Builder $query)
    {
        return $query->where('status', '1');
    }

    public function scopeTomorrow(Builder $query)
    {
        $query->where('due_date', Carbon::tomorrow());
    }

    public function scopeTaskInfo(Builder $query)
    {
        $query->select(
            ['name', 'status', 'due_date', 'created_at', 'user_id', 'group_id', 'priority_id', 'id']
        );
    }

    public function isDone(): bool
    {
        return $this->status === 'done';
    }
}
