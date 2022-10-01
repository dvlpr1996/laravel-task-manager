<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function destroyUser(Request $request, User $user)
	{
		Auth::logout($user);
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		User::findOrFail($user->id)->delete();
		// send email
		// cant return back
		return redirect()->route('destroyUser.index');
	}

	public function update(UserRequest $request, User $user)
	{
		$user = $user->update([
			'fname' => $request->fname,
			'lname' => $request->lname,
			'email' => $request->email
		]);

		if (!$user) abort(500, 'Error');

		return back()->with('userSuccessUpdated', 'Your information Successfully Updated');
	}
}
