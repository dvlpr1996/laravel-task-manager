<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AllLists extends Component
{
    public $allLists;

    public function __construct()
    {
        $this->allLists = auth()->user()->groups()->paginate(10);
    }

    public function render()
    {
        return view('components.all-lists');
    }
}
