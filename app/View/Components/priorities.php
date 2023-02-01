<?php

namespace App\View\Components;

use App\Models\Priority;
use Illuminate\View\Component;

class priorities extends Component
{
    public $allPriority;

    public $select;

    public function __construct($select = '')
    {
        $this->select = $select;
        $this->allPriority = Priority::select(['id', 'level'])->get();
    }

    public function render()
    {
        return view('components.priorities');
    }
}
