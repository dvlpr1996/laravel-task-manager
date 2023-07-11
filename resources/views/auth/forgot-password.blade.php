@extends('auth.layouts.master')

@section('title', 'Forgot password')
@section('authContent')

		<main class="flex min-h-screen flex-col items-center justify-center">

				<div class="form-wrapper w-[450px] bg-slate-800">

						<x-auth-validation-errors class="round mb-4 bg-red-400 p-4" :errors="$errors" />
						<x-auth.auth-session-status class="mb-4" :status="session('status')" />

						<h3 class="text-center">forgot password</h3>

						<form class="space-y-4" method="POST" action="{{ route('password.email') }}">
								@csrf
								<div>
										<label>
												email address
												<input type="email" placeholder="type your username" class="form-control" onclick="this.value=''"
														name="email">
										</label>
								</div>

								<div>
										<button type="submit" class="btn w-full py-2">send</button>
								</div>

								<p class="text-center text-sm">
										we will email you a password reset link will allow you to choose a new one
								</p>
						</form>
				</div>
		</main>
@endsection
