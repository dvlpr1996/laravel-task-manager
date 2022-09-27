<?php

namespace App\View\Components;

use App\Models\Group;
use Illuminate\View\Component;

class Groups extends Component
{
	public $allGroups;
	public function __construct()
	{
		$this->allGroups = Group::select(['id','name'])->get();
	}

	public function render()
	{
		return view('components.groups');
	}
}
