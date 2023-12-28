<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, Group $group)
    {
        return (($user->id === auth()->user()->id) && ($group->user_id === auth()->user()->id));
    }

    public function create(User $user)
    {
        return $user->id === auth()->user()->id;
    }

    public function update(User $user, Group $group)
    {
        return (($user->id === auth()->user()->id) && ($group->user_id === auth()->user()->id));
    }

    public function delete(User $user, Group $group)
    {
        return (($user->id === auth()->user()->id) && ($group->user_id === auth()->user()->id));
    }
}
