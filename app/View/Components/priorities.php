<?php

namespace App\View\Components;

use App\Models\Priority;
use Illuminate\View\Component;

class priorities extends Component
{
	public $allPriority;

	public function __construct()
	{
		$this->allPriority = Priority::select(['id','level'])->get();
	}

	public function render()
	{
		return view('components.priorities');
	}
}
