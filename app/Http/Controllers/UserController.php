<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

	public function updatePassword(Request $request)
	{

		$request->validate([
			'oldPassword' => ['required', 'min:6'],
			'newPassword' => ['required', 'confirmed', 'min:6']
		]);

		if (!Hash::check($request->oldPassword, auth()->user()->password)) {
			return back()->with("error", "Old Password Doesn't match!");
		}

		if (Hash::check($request->newPassword, auth()->user()->password)) {
			return back()->with("error", "Old Password and new Password are same");
		}

		$user = User::whereId(auth()->user()->id)->update([
			'password' => Hash::make($request->newPassword)
		]);

		if (!$user) abort(500, 'Error');

		return back()->with("status", "Password changed successfully!");
	}
}
