<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\changePassword;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\updatePassword;

class UserController extends Controller
{
	public function destroyUser(Request $request, User $user)
	{
		$this->logOut($user, $request);

		User::findOrFail($user->id)->delete();

		return redirect()->route('login.create');
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

	public function updatePassword(updatePassword $request, User $user)
	{
		if (!Hash::check($request->oldPassword, $user->password)) {
			return back()->with("error", "Old Password Doesn't match!");
		}

		if (Hash::check($request->newPassword, $user->password)) {
			return back()->with("error", "Old Password and new Password are same");
		}

		User::whereId($user->id)->update([
			'password' => Hash::make($request->newPassword)
		]);

		event(new changePassword($user));

		$this->logOut($user, $request);

		return redirect()->route('login.create');
	}

	private function logOut($user, $request)
	{
		Auth::logout($user);
		$request->session()->invalidate();
	}
}
