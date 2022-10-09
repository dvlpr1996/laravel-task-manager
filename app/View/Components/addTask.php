<?php

namespace App\View\Components;

use Illuminate\View\Component;

class addTask extends Component
{
	public $modalType;
	public function __construct($modalType = '')
	{
		$this->modalType = $modalType;
	}

	public function render()
	{
		return view('components.add-task');
	}
}
