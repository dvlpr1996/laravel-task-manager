<?php

namespace App\View\Components\list;

use App\Models\Group;
use Illuminate\View\Component;

class AllLists extends Component
{
    public $allLists;

    public function __construct()
    {
        $this->allLists = Group::with('tasks:id,group_id')
            ->where('user_id', auth()->user()->id)->paginate(PAGINATION_NUMBER);
    }

    public function render()
    {
        return view('components.list.all-lists');
    }
}
