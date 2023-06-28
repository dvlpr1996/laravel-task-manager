<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trait\RequestTrait;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    use RequestTrait;

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:16'],
            'lname' => ['required', 'string', 'max:32'],
            'email' => array_merge($this->emailRule, ['unique:users']),
            'pass' => array_merge(
                $this->passwordRule,
                ['confirmed', Rules\Password::defaults()]
            ),
        ]);

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME . auth()->user()->slug)
            ->withToastSuccess('Welcome To Task Manager');
    }
}
