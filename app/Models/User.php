<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Trait\ModelTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, ModelTrait;

    protected $fillable = [
        'fname', 'lname', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)->orderByDesc('created_at');
    }

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function fullName()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function slug()
    {
        return Str::slug($this->fname . ' ' . $this->lname);
    }

    public function calculateDaysWithUs()
    {
        return (new Carbon($this->attributes['created_at']))->longAbsoluteDiffForHumans();
    }

    public function calculateTotalTask()
    {
        return $this->tasks()->count();
    }

    public function calculateUnDoneTask()
    {
        return $this->tasks()->where('status', '!=', '1')->count();
    }

    public function calculateTotalList()
    {
        return $this->groups()->count();
    }

    public function gravatar()
    {
        $hash = md5(strtolower($this->attributes['email']));

        return "http://s.gravatar.com/avatar/$hash";
    }

    public static function authUser()
    {
        return auth()->user();
    }
}
