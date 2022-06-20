<?php

// todo : pattern and mw and group and route filing
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/todo', function () {
	return view("todo");
})->name("todo");

Route::get('/', function () {
	return view("dashboard");
})->name("dashboard");
