<?php

namespace App\Http\Controllers;

use App\Events\changePassword;
use App\Events\DeleteAccount;
use App\Http\Requests\updatePassword;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function destroyUser(Request $request, User $user)
    {
        $this->authorize('delete', $user);
        $this->logOut($user, $request);

        User::findOrFail($user->id)->delete();

        event(new DeleteAccount($user));

        return redirect()->route('login.create');
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
        ]);

        return back()->withToastSuccess(__('app.userSuccessUpdated'));
    }

    public function updatePassword(updatePassword $request, User $user)
    {
        $this->authorize('update', $user);

        if (! Hash::check($request->oldPassword, $user->password)) {
            return back()->with('status', "Old Password Doesn't match!");
        }

        if (Hash::check($request->newPassword, $user->password)) {
            return back()->with('status', 'Old Password and new Password are same');
        }

        User::whereId($user->id)->update([
            'password' => Hash::make($request->newPassword),
        ]);

        event(new changePassword($user));

        return back();
    }

    private function logOut($user, $request)
    {
        Auth::logout($user);
        $request->session()->invalidate();
    }
}
