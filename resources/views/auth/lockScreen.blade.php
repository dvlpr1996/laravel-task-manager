@extends('layout.master')

@section('pageTitle', 'Task Manager - Lock Screen')

@section('pageContent')

<main class="p-4 flex min-h-screen flex-col items-center justify-center bg-gray-50 dark:bg-gray-900">

		<form class="form-wrapper">
			<a href="{{ route('index') }}" class="nav-link">
				<img src="{{ asset('img/laravel-task-manager.png') }}" alt="Task Manager" class="mx-auto block h-20 w-20">
		</a>

				<div class="mt-5 text-center text-gray-700 dark:text-gray-200">
						<p>John Doe</p>
						<p>johndoe@example.com</p>
				</div>

				<div class="mt-5">
						<input type="password" placeholder="password" class="form-input">
				</div>

				<div class="mt-5">
						<button type="submit" class="btn">unlock</button>
				</div>

		</form>
</main>

@endsection
