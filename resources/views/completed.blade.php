@extends('layouts.master')
@section('title', strtoupper('completed tasks'))
@section('main-content')
		<section class="space-y-8">
				<h2>your completed tasks</h2>

				<div class="flex flex-col items-center justify-center gap-3 sm:flex-row">
						<img src="{{ asset('img/logo.png') }}" alt="logo"class="rounded-full w-12 h-12" loading="lazy">
						<h1>laravel task manager</h1>
				</div>

				<div class="relative mx-auto sm:w-4/6 md:w-3/5">
						<form>
								<input type="text" name="search" class="form-control" placeholder="Search Your Tasks" autocomplete="off">
						</form>

						<div class="pointer-events-none absolute inset-y-0 right-2 flex items-center pl-3">
								<svg class="h-5 w-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd"
												d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
												clip-rule="evenodd"></path>
								</svg>
						</div>
				</div>

		</section>

		<div class="justify-left flex items-center gap-2">
				<p>Sort :</p>
				<a href="#"><i class="fas fa-sort-alpha-down ml-1"></i> AS</a>
				<a href="#"><i class="fas fa-sort-alpha-down-alt ml-1"></i> DS</a>
				<a href="#"><i class="fas fa-stopwatch ml-1"></i> Due date</a>
		</div>

		<hr class="hr">

		<x-completed-tasks></x-completed-tasks>

@endsection
