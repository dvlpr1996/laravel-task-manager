<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'verified'])->group(function () {

	Route::controller(UserController::class)->group(function () {
		Route::Get('user/{user}/delete', 'destroyUser')->middleware(['password.confirm'])
			->name('dashboard.destroyUser');
		Route::PUT('user/update/{user}', 'update')->name('user.update');
		Route::PUT('user/{user}/update-password', 'updatePassword')->name('user.updatePassword');
	});

	Route::controller(TaskController::class)->group(function () {
		Route::GET('/inbox', 'index')->name('inbox.index');
		Route::POST('/tasks', 'store')->name('tasks.store');
		Route::GET('/tasks/delete/{task}', 'destroy')->name('tasks.destroy');
		Route::PUT('/tasks/update/{task}', 'update')->name('tasks.update');
	});

	Route::controller(GroupController::class)->group(function () {
		Route::Get('/lists/{group:name}', 'index')->name('lists.index');
		Route::GET('/lists/delete/{group}', 'destroy')->name('lists.destroy');
		Route::PUT('/lists/update/{group}', 'update')->name('lists.update');
		Route::POST('/lists', 'store')->name('lists.store');
	});

	Route::view('/today', 'today')->name('today.index');
	Route::view('/deleteAccount', 'destroyUser')->name('destroyUser.index');
	Route::view('/tomorrow', 'tomorrow')->name('tomorrow.index');
	Route::view('/completed', 'completed')->name('completed.index');
	
	Route::Get('/priorities/{priority}', [PriorityController::class, 'index'])->name('priorities.index');
	Route::Get('/', [DashboardController::class, 'index'])->name('dashboard.index');

});

Route::GET('/test', function () {
	dd(__('app.groupSuccessDelete'));
});

require __DIR__ . '/auth.php';
