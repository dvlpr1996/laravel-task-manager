@extends('auth.layouts.master')

@section('title', 'Confirm Password')

@section('authContent')

		<main class="flex min-h-screen flex-col items-center justify-center">

				<div class="form-wrapper w-[450px] space-y-5">

						<x-auth.auth-validation-errors class="mb-4" :errors="$errors" />

						<h3 class="text-center">Confirm your Password</h3>

						<p class="text-center text-base text-red-500">
							This is a secure area of the application. Please confirm your password before continuing.
						</p>

						<form class="space-y-4" method="POST" action="{{ route('password.confirm') }}">
							@csrf
								<div>
										<label>
												password
												<input type="password" placeholder="type your password" class="form-control" onclick="this.value=''"
														name="password">
										</label>
								</div>

								<div>
										<button type="submit" class="btn w-full py-2">send</button>
								</div>
						</form>

						<a href="{{ route('logout') }}" class="inline-block">logout</a>
				</div>
		</main>
@endsection
