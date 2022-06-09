@extends("layout.master")
@section("pageTitle" , "Task Manager - Forgot Password")
@section("pageContent")

<main class="p-4 flex flex-col justify-center items-center min-h-screen bg-gray-50 dark:bg-gray-900">

	<form class="form-wrapper">
		<a href="{{ route('index') }}" class="nav-link">
			<img src="{{ asset('img/laravel-task-manager.png') }}" alt="Task Manager" class="mx-auto block h-20 w-20">
	</a>

		<a href="{{ route('index') }}" class="nav-link text-center block mt-2 text-base">Task Manager</a>

		<div class="mt-5">
			<input type="email" placeholder="email" class="form-input">
		</div>

		<div class="mt-5">
			<button type="submit" class="btn">Recover password</button>
		</div>

	</form>

</main>

@endsection
