<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Group;
use Illuminate\View\Component;

class Groups extends Component
{
    public $allGroups;

    public $select;

    public function __construct($select = '')
    {
        $this->select = $select;
        $this->allGroups = Group::where('user_id', auth()->user()->id)->pluck('name', 'id');
    }

    public function render()
    {
        return view('components.groups');
    }
}
