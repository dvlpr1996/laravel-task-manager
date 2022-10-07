<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
	public function index()
	{
		$unfinishedTasks = auth()->user()->tasks()->where('status', '!=', '1')->paginate(10);

		return view('dashboard', compact('unfinishedTasks'));
	}

}
