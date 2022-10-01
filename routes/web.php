<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;

Route::middleware('auth')->group(function () {
	Route::view('/', 'dashboard')->name('dashboard.index');
	Route::GET('/inbox', [TaskController::class, 'index'])->name('inbox.index');
	Route::POST('/tasks', [TaskController::class, 'store'])->name('tasks.store');
	Route::GET('/tasks/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
	Route::PUT('/tasks/update/{task}', [TaskController::class, 'update'])->name('tasks.update');

	Route::view('/today', 'today')->name('today.index');
	Route::view('/tomorrow', 'tomorrow')->name('tomorrow.index');

	Route::view('/completed', 'completed')->name('completed.index');

	Route::Get('/lists/{group:name}', [GroupController::class, 'index'])->name('lists.index');
	Route::GET('/lists/delete/{group}', [GroupController::class, 'destroy'])->name('lists.destroy');
	Route::PUT('/lists/update/{group}', [GroupController::class, 'update'])->name('lists.update');
	Route::POST('/lists', [GroupController::class, 'store'])->name('lists.store');
});

Route::GET('/test', function () {

});

require __DIR__ . '/auth.php';
