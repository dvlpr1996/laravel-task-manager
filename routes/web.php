<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware('auth')->group(function () {
	Route::view('/', 'dashboard')->name('dashboard.index');
	Route::GET('/inbox', [TaskController::class, 'index'])->name('inbox.index');
	Route::POST('/tasks', [TaskController::class, 'store'])->name('tasks.store');
	Route::GET('/tasks/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
	Route::PUT('/tasks/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
});


Route::GET('/test', function () {
});

require __DIR__ . '/auth.php';
