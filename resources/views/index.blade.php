@extends('layouts.master')

@section('title', strtoupper('home'))

@section('main-content')
		<section class="space-y-8">
				<p class="text-xl font-semibold capitalize text-gray-600 dark:text-gray-300">
					your inbox
				</p>

				<div class="flex items-center justify-center gap-2 capitalize">
						<img src="{{ asset('img/logo.png') }}" alt="logo"class="rounded-full w-12 h-12"
								loading="lazy">
						<h1 class="text-2xl font-semibold text-gray-600 dark:text-gray-300">
								task manager
						</h1>
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

		<section class="space-y-8">
				<div class="flex items-end justify-between">
						<div class="flex items-center justify-between gap-1 text-gray-600 dark:text-gray-300 md:gap-2">
								<p>Sort :</p>
								<a href="#"><i class="fas fa-sort-alpha-down ml-1"></i> AS</a>
								<a href="#"><i class="fas fa-sort-alpha-down-alt ml-1"></i> DS</a>
								<a href="#"><i class="fas fa-stopwatch ml-1"></i> Due date</a>
						</div>

						<button type="button" class="btn curso-pointer w-[initial]" id="add">add new task</button>
				</div>

				<hr class="hr">

				<div class="overflow-x-auto rounded-xl bg-white p-2 shadow-md dark:bg-gray-800">
						<table class="whitespace-no-wrap w-full text-center text-base capitalize text-gray-500 dark:text-gray-400">

								<thead
										class="border-b bg-gray-50 font-bold text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
										<tr>
												<th scope="col" class="py-3 px-6">#</th>
												<th scope="col" class="py-3 px-6">task name</th>
												<th scope="col" class="py-3 px-6">task created</th>
												<th scope="col" class="py-3 px-6">tag</th>
												<th scope="col" class="py-3 px-6">list name</th>
												<th scope="col" class="py-3 px-6">Due date</th>
												<th scope="col" class="py-3 px-6">action</th>
										</tr>
								</thead>

								<tbody x-data="{ data: 10 }" class="divide-y bg-white dark:divide-gray-700 dark:bg-gray-800">
										<template x-for="td in data">
												<tr
														class="text-gray-700 odd:bg-white even:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 odd:dark:bg-gray-800 even:dark:bg-gray-700">
														<td class="py-3 px-6" x-text="td"></td>
														<td class="py-3 px-6">Sliver</td>
														<td class="py-3 px-6">Laptop</td>
														<td class="py-3 px-6">Laptop</td>
														<td class="py-3 px-6">$2999</td>
														<td class="py-3 px-6">675456</td>
														<td class="space-x-3 py-3 px-6">
																<a href="#" id="updateAction">
																		<i
																				class="fas fa-edit focus:shadow-outline-gray text-purple-600 hover:text-purple-700 focus:outline-none dark:text-gray-400 hover:dark:text-gray-500"></i>
																</a>
																<a href="#" id="deleteAction">
																		<i
																				class="fas fa-trash focus:shadow-outline-gray text-purple-600 hover:text-purple-700 focus:outline-none dark:text-gray-400 hover:dark:text-gray-500"></i>
																</a>
														</td>
												</tr>
										</template>
								</tbody>
						</table>
				</div>

				<div>
						<nav>
								<ul class="pagination">
										<li class="page-item">
												<a class="nav-link" href="#">Pre</a>
										</li>
										<li class="page-item">
												<a class="nav-link" href="#">1</a>
										</li>
										<li class="page-item">
												<a class="nav-link" href="#">2</a>
										</li>
										<li class="page-item">
												<a class="nav-link" href="#">3</a>
										</li>
										<li class="page-item">
												<a class="nav-link" href="#">Next</a>
										</li>
								</ul>
						</nav>
				</div>

		</section>


@endsection
