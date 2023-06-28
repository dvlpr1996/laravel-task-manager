@extends('auth.layouts.master')

@section('title', 'Login')
@section('authContent')

		<main class="flex min-h-screen flex-col items-center justify-center">

				<div class="form-wrapper w-[330px] px-5">

						<div class="mb-7 text-center">
								{{-- <x-app-logo class="mx-auto block"></x-app-logo> --}}
								<span class="text italic">Entering task manager</span>
						</div>

						<x-auth-session-status class="mb-4" :status="session('status')" />
						<x-auth-validation-errors class="round mb-2 bg-red-400 p-2" :errors="$errors" />

						<form class="space-y-3" method="POST" action={{ route('login.store') }}>
								@csrf
								<div>
										<label>
												email address
												<input type="email" name="email" placeholder="username" class="form-control" value="{{ old('email') }}"
														onclick="this.value=''">
										</label>
								</div>

								<div>
										<label>
												password
												<input type="password" name="password" placeholder="password" class="form-control" minlength="6"
														maxlength="128">
										</label>
								</div>

								<div>
										<input type="checkbox" id="checkbox" name="remember">
										<label class="text-sm" for="checkbox">
												remember me
										</label>
								</div>

								<div>
										<button type="submit" class="btn w-full py-2">sign in</button>
								</div>

								<div class="space-x-2 text-center">
										<a href="{{ route('password.request') }}" class="text-sm">
												forgot password
										</a>
										<a href="{{ route('register.create') }}" class="text-sm">Create account</a>
								</div>
						</form>
				</div>
		</main>
@endsection
