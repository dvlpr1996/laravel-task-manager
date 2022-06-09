<?php

// todo : pattern and mw and group
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name("index");

Route::get('/login', function () {
	return view('auth.login');
})->name("login");

Route::get('/lock-screen', function () {
	return view('auth.lockScreen');
})->name("lock-screen");

Route::get('/register', function () {
	return view('auth.register');
})->name("register");

Route::get('/forgot-password', function () {
	return view('auth.forgotPass');
})->name("forgot-password");
