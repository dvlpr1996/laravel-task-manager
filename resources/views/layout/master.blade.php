<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
		<title>@yield('pageTitle', 'Task Manager')</title>
		<meta charset="UTF-8">
		<meta name="language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="index, follow">
		<meta name="designer" content="Nima jahan bakhshian">
		<meta name="owner" content="Nima jahan bakhshian">
		<meta name="author" content="Nima jahan bakhshian">
		<meta name="keywords" content="task manager login, dvlpr1996">
		<meta name="description" content="task manager (todo list) laravel app for managing tasks">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{-- //todo : fix color --}}
		<meta name="theme-color" content="#1C1D1F">
		<meta name="msapplication-TileColor" content="#1C1D1F">
		<meta name="msapplication-navbutton-color" content="#1C1D1F">
		<meta name="apple-mobile-web-app-status-bar-style" content="#1C1D1F">
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/pngx-icon">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
		<link rel="apple-touch-icon" sizes="180x180"href="{{ asset('favicon.ico') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<!-- [if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<![endif] -->
</head>

<body class="debug-screens bg-gray-200 dark:bg-gray-900" x-data="{ 'darkMode': true }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)));">

		<div x-bind:class="{ 'dark': darkMode === true }">

				<nav class="navbar">
						<div>
								<a href="#" class="flex items-center gap-2 text-gray-800 dark:text-gray-200">
										<img src="{{ asset('img/laravel-task-manager.png') }}" alt="Laravel Task Manager"
												class="h-12 w-12 rounded-full" loading="lazy">
										<span class="hidden md:block">Laravel Task Manager</span>
								</a>
						</div>

						<div class="flex items-center gap-4">
								<i class="fas fa-adjust cursor-pointer" id="theme-toggle" x-on:click="darkMode = !darkMode">
								</i>

								<div x-data="dropdown" x-on:click.away="away()" class="relative capitalize">
										<button x-on:click="toggle()">
												John Doe
												<i class="fa fa-caret-down"></i>
										</button>

										<div class="dropdown-content hidden" x-show="open" x-transition.duration.500ms
												x-bind:class="{ 'hidden': !open }">

												<div x-data="modal" x-on:keydown.escape="close()" x-on:click.away="close()">
														<p x-on:click="toggle()" class="nav-link m-2 block text-left">
																<i class="fas fa-lock mr-1"></i>
																Settings
														</p>

														<div class="modal-wrapper" x-show="showModal">

																<div class="modal-content hidden" x-on:click.away="close()" x-bind:class="{ 'hidden': !showModal }"
																		x-bind="transition">
																		<div class="flex items-center gap-3 py-2">
																				<h3 class="text-xl font-semibold">profile settings</h3>
																		</div>
																		<div>
																				<form class="form-wrapper p-5">

																						<div>
																								<input type="text" placeholder="first name" class="form-control">
																						</div>

																						<div class="mt-5">
																								<input type="text" placeholder="last name" class="form-control">
																						</div>

																						<div class="mt-5">
																								<input type="email" placeholder="email address" class="form-control">
																						</div>

																						<div class="mt-5">
																								<input type="password" placeholder="current password" class="form-control">
																						</div>

																						<div class="mt-5">
																							<input type="password" placeholder="new password" class="form-control">
																					</div>

																						<div class="mt-5">
																								<input type="password" placeholder="Confirm new password" class="form-control">
																						</div>

																						<div class="mt-5">
																								<button type="submit" class="btn">save changes</button>
																						</div>

																				</form>
																		</div>
																</div>
														</div>
												</div>

												<a href="{{ route('lock-screen') }}" class="nav-link m-2 block text-left">
														<i class="fas fa-sign-out-alt mr-1"></i>
														lock screen
												</a>

												<hr class="hr">

												<a href="movies.html" class="nav-link m-2 block text-left">
														<i class="fas fa-sign-out-alt mr-1"></i>
														Logout
												</a>

										</div>

								</div>
								<img src="{{ asset('img/avatar.png') }}" alt="{{ 'avatar name' }}" class="h-12 w-12 rounded-full"
										loading="lazy">
						</div>
				</nav>

				<section class="relative flex" x-data="sidebar">
						<aside
								class="absolute z-10 hidden h-full w-2/6 border border-gray-200 bg-gray-100 py-5 px-2 dark:border-gray-800 dark:bg-gray-800 md:static md:z-0 md:block md:h-[initial] md:w-2/12 lg:p-5"
								x-bind:class="{ 'hidden': !sidebarOpen }">
								<ul class="space-y-5 capitalize text-gray-500 dark:text-gray-400">

										<li class="aside-items">
												<i class="fas fa-tachometer-alt mr-1"></i>
												<a href="dashboard.html">dashboard</a>
										</li>

										<li class="aside-items">
												<i class="fas fa-inbox mr-1"></i>
												<a href="#">inbox</a>
										</li>

										<li class="aside-items">
												<i class="fas fa-star mr-1"></i>
												<a href="#">today</a>
										</li>

										<li class="aside-items">
												<i class="fas fa-calendar-week mr-1"></i>
												<a href="#">upcoming</a>
										</li>

										<li class="aside-items">
												<i class="fas fa-hashtag mr-1"></i>
												<a href="#">important</a>
										</li>

										<li x-data="dropdown" x-on:click.away="away()">
												<i class="fas fa-clipboard-list mr-2"></i>
												<a href="#" x-on:click="toggle()">lists</a>
												<ul x-show="open" x-transition.duration.800ms class="scroller hidden" x-bind:class="{ 'hidden': !open }"
														x-data="{ lists: 5 }">

														<template x-for="l in lists">
																<li href="movies.html"
																		class="my-2 ml-1 block text-left text-sm transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
																		<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
																				<a href="#"><i class="fas fa-folder mr-1"></i>list name</a>
																				<div class="my-1 flex flex-row items-center gap-1">
																						<a href="#" id="updateList"
																								class="hover:text-purple-700 focus:outline-none dark:text-gray-400 hover:dark:text-gray-500"><i
																										class="fas fa-edit"></i></a>
																						<a href="#" id="deleteList"
																								class="hover:text-purple-700 focus:outline-none dark:text-gray-400 hover:dark:text-gray-500"><i
																										class="fas fa-trash"></i></a>
																				</div>
																		</div>
																</li>
														</template>

														<div>
																<form>
																		<input type="text" class="form-control py-1" autocomplete="off">
																		<button type="submit" class="btn mt-2 w-[initail]">new list</button>
																</form>
														</div>
												</ul>
										</li>

										<li class="aside-items">
												<i class="fas fa-check-circle mr-1"></i>
												<a href="#">completed</a>
										</li>

										<li class="aside-items">
												<i class="fas fa-trash mr-1"></i>
												<a href="#">trash</a>
										</li>
								</ul>
						</aside>
						<main
								class="bg-cool-gray-50 w-full flex-1 space-y-10 border border-gray-200 p-5 dark:border-gray-800 dark:bg-gray-900 md:w-10/12">

								@yield('main-content')
				</section>
				</main>
				</section>
		</div>
		<script src="{{ asset('js/app.js') }}" defer></script>
		@include('sweetalert::alert')
</body>

</html>
