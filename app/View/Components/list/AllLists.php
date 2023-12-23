<?php

namespace App\View\Components\list;

use Illuminate\View\Component;

class AllLists extends Component
{
    public $allLists;

    public function __construct()
    {
        $this->allLists = auth()->user()->groups()->paginate(PAGINATION_NUMBER);
    }

    public function render()
    {
        return view('components.list.all-lists');
    }
}
