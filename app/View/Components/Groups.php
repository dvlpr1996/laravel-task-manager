<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Groups extends Component
{
	public $allGroups;
	public $select;
	public function __construct($select='')
	{
		$this->select = $select;
		$this->allGroups = auth()->user()->groups()->select(['id','name'])->get();
	}

	public function render()
	{
		return view('components.groups');
	}
}
