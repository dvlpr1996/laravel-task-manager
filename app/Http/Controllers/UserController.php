<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function destroyUser(Request $request, User $user)
	{
		Auth::logout($user);
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		User::find($user->id)->delete();
		// send email
		// cant return back
		return redirect()->route('destroyUser.index');
	}
}
