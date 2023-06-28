@extends('auth.layouts.master')

@section('title', 'Reset Password')

@section('authContent')

		<main class="flex min-h-screen flex-col items-center justify-center">

				<div class="form-wrapper w-[450px] bg-slate-800">

						<x-auth-validation-errors class="round mb-4 bg-red-400 p-4" :errors="$errors" />

						<h3 class="text-center">Reset Password</h3>

						<form class="space-y-4" method="POST" action="{{ route('password.update') }}">
								@csrf
								@method('put')
								{{-- Password Reset Token --}}
								<input type="hidden" name="token" value="{{ $request->route('token') }}">

								<div>
										<label>
												email address
												<input type="email" placeholder="type your username" class="form-control" onclick="this.value=''"
														name="email" value={{ $request->email }}>
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
										<label>
												confirm password
												<input type="password" name="password_confirmation" placeholder="password" class="form-control" minlength="6"
														maxlength="128">
										</label>
								</div>

								<div>
										<button type="submit" class="btn w-full py-2">Reset Password</button>
								</div>
						@endsection
