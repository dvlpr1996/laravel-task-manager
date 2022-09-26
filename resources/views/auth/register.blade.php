@extends('layouts.authMaster')
@section('title', 'Register')
@section('authContent')

		<body class="p-4 sm:p-0">
				<main class="flex min-h-screen flex-col items-center justify-center">

						<div class="form-wrapper w-[370px] px-5 py-2">

								<div class="mb-7 mt-2 text-center">
										{{-- <x-app-logo class="mx-auto block"></x-app-logo> --}}
										<span class="text italic">Join task manager</span>
								</div>

								<x-auth-validation-errors class="round mb-2 bg-red-400 p-2" :errors="$errors" />

								<form class="space-y-5" method="POST" action="{{ route('register.store') }}">
										@csrf

										<div class=w-full>
												<label>first name</label>
												<span class="text-sm text-rose-600">
														<i class="ri-asterisk"></i>
												</span>
												<input type="text" placeholder="first name" name="fname" class="form-control" required minlength="3"
														maxlength="16" value="{{ old('fname') }}" onclick="this.value=''">
										</div>

										<div class=w-full>
												<label>last name</label>
												<span class="text-sm text-rose-600">
														<i class="ri-asterisk"></i>
												</span>
												<input type="text" placeholder="last name" name="lname" class="form-control" required minlength="3"
														maxlength="32" value="{{ old('lname') }}" onclick="this.value=''">
										</div>

										<div>
												<label>email</label>
												<span class="text-sm text-rose-600">
														<i class="ri-asterisk"></i>
												</span>
												<input type="email" placeholder="email address" name="email" class="form-control" required
														value="{{ old('email') }}" onclick="this.value=''">
										</div>

										<div class="flex flex-col items-center justify-between gap-2 sm:flex-row">
												<div class=w-full>
														<label>password</label>
														<span class="text-sm text-rose-600">
																<i class="ri-asterisk"></i>
														</span>
														<input type="password" placeholder="password" name="pass" class="form-control" required minlength="6"
																maxlength="128" onclick="this.value=''">
												</div>

												<div class=w-full>
														<label>confirm password</label>
														<span class="text-sm text-rose-600">
																<i class="ri-asterisk"></i>
														</span>
														<input type="password" placeholder="confirm password" name="pass_confirmation" class="form-control" required
																minlength="6" maxlength="128" onclick="this.value=''">
												</div>
										</div>

										<button type="submit" class="btn w-full py-2">registered</button>

										<a href="{{ route('login.create') }}" class="my-5 inline-block text-sm">
											already have an account
										</a>
								</form>
						</div>
				</main>

		@endsection
