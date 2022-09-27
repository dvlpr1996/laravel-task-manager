<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware('auth')->group(function () {
	Route::view('/', 'dashboard')->name('dashboard.index');
	Route::view('/inbox', 'inbox')->name('inbox.index');
	Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
});


Route::get('/test', function () {
});

require __DIR__ . '/auth.php';
