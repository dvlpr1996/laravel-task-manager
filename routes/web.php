<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
	Route::get('/', function () {
		return view('dashboard');
	})->name('dashboard.index');

	Route::get('/inbox', function () {
		return view('inbox');
	})->name('inbox.index');
});


Route::get('/test', function () {
});

require __DIR__ . '/auth.php';
