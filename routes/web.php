<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware('auth')->group(function () {
	Route::view('/', 'dashboard')->name('dashboard.index');
	Route::GET('/inbox', [TaskController::class, 'index'])->name('inbox.index');
	Route::POST('/tasks', [TaskController::class, 'store'])->name('tasks.store');
	Route::GET('/tasks/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
	Route::PUT('/tasks/update/{task}', [TaskController::class, 'update'])->name('tasks.update');

	Route::view('/today', 'today')->name('today.index');
	Route::view('/tomorrow', 'tomorrow')->name('tomorrow.index');
});


Route::GET('/test', function () {
	$tomorrowTasks = auth()->user()->tasks()->where('status', '!=', '1')
			->where('due_date', Carbon::tomorrow())
			->get();
dd($tomorrowTasks);
});

require __DIR__ . '/auth.php';
