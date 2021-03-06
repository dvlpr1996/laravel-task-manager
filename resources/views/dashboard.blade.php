@extends('layout.master')
@section('pageTitle', 'Task Manager - Dashboard')
@section('main-content')

		<div class="flex items-center justify-between">
				<p class="text-xl font-semibold capitalize text-gray-600 dark:text-gray-300">
						Task Manager - Dashboard
				</p>

				<p class="block md:hidden" x-on:click="toggle()">
						<!-- <i class="fas fa-times"></i> -->
						<i class="fas fa-bars cursor-pointer text-xl font-semibold text-gray-600 dark:text-gray-300"></i>
				</p>

		</div>

		<section class="xs:grid-cols-2 grid gap-3 sm:grid-cols-4">
				<div class="rounded-xl border border-gray-300 bg-gray-200 p-5 dark:border-gray-800 dark:bg-gray-800">
						<p class="text-sm font-bold leading-6 text-gray-600 dark:text-gray-300">
								<span class="block text-base font-semibold">555</span>
								days with us
						</p>
				</div>

				<div class="rounded-xl border border-gray-300 bg-gray-200 p-5 dark:border-gray-800 dark:bg-gray-800">
						<p class="text-sm font-bold leading-6 text-gray-600 dark:text-gray-300">
								<span class="block text-base font-semibold">17</span>
								total task
						</p>
				</div>

				<div class="rounded-xl border border-gray-300 bg-gray-200 p-5 dark:border-gray-800 dark:bg-gray-800">
						<p class="text-sm font-bold leading-6 text-gray-600 dark:text-gray-300">
								<span class="block text-base font-semibold">17</span>
								deleted task
						</p>
				</div>

				<div class="rounded-xl border border-gray-300 bg-gray-200 p-5 dark:border-gray-800 dark:bg-gray-800">
						<p class="text-sm font-bold leading-6 text-gray-600 dark:text-gray-300">
								<span class="block text-base font-semibold">555</span>
								total list
						</p>
				</div>
		</section>

		<section class="space-y-3">
				<p class="text-xl font-semibold text-gray-600 dark:text-gray-300">
						your lists
				</p>
				<div class="overflow-x-auto rounded-xl bg-white p-2 shadow-md dark:bg-gray-800">
						<table class="whitespace-no-wrap w-full text-center text-sm text-gray-500 dark:text-gray-400">
								<thead
										class="border-b bg-gray-50 text-left font-semibold uppercase tracking-wide text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
										<tr>
												<th scope="col" class="px-6 py-3">#</th>
												<th scope="col" class="px-6 py-3">list name</th>
												<th scope="col" class="px-6 py-3">status</th>
												<th scope="col" class="px-6 py-3">list created</th>
												<th scope="col" class="px-6 py-3">list changed</th>
												<th scope="col" class="px-6 py-3">action</th>
										</tr>
								</thead>

								<tbody x-data="{ data: 5 }" class="divide-y bg-white text-left dark:divide-gray-700 dark:bg-gray-800">
										<template x-for="td in data">
												<tr
														class="text-gray-700 odd:bg-white even:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 odd:dark:bg-gray-800 even:dark:bg-gray-700">
														<td class="px-6 py-4" x-text="td"></td>
														<td class="px-6 py-4">Sliver</td>
														<td class="px-6 py-4">$2999</td>
														<td class="px-6 py-4">$2999</td>
														<td class="px-6 py-4">675456</td>
														<td class="space-x-3 px-6 py-4">
																<a href="#"><i
																				class="fas fa-edit focus:shadow-outline-gray text-purple-600 focus:outline-none dark:text-gray-400"></i></a>
																<a href="#"><i
																				class="fas fa-trash focus:shadow-outline-gray text-purple-600 focus:outline-none dark:text-gray-400"></i></a>
														</td>
												</tr>
										</template>
								</tbody>
						</table>
				</div>

		</section>

		<section class="xs:grid-cols-1 grid gap-3 md:grid-cols-2">
				<div class="rounded-xl border border-gray-300 bg-gray-200 p-5 dark:border-gray-800 dark:bg-gray-800">
						<p class="text-sm font-bold leading-6 text-gray-600 dark:text-gray-300">
								<span class="block text-base font-semibold">555</span>
								days with us
						</p>
				</div>

				<div class="rounded-xl border border-gray-300 bg-gray-200 p-5 dark:border-gray-800 dark:bg-gray-800">
						<p class="text-sm font-bold leading-6 text-gray-600 dark:text-gray-300">
								<span class="block text-base font-semibold">555</span>
								days with us
						</p>
				</div>
		</section>

		<section class="space-y-3">
				<p class="text-xl font-semibold text-gray-600 dark:text-gray-300">
						Unfinished tasks
				</p>
				<div class="overflow-x-auto rounded-xl bg-white p-2 shadow-md dark:bg-gray-800">
						<table class="whitespace-no-wrap w-full text-center text-sm text-gray-500 dark:text-gray-400">
								<thead
										class="border-b bg-gray-50 text-left font-semibold uppercase tracking-wide text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
										<tr>
												<th scope="col" class="px-6 py-3">#</th>
												<th scope="col" class="px-6 py-3">task name</th>
												<th scope="col" class="px-6 py-3">status</th>
												<th scope="col" class="px-6 py-3">task created</th>
												<th scope="col" class="px-6 py-3">list name</th>
												<th scope="col" class="px-6 py-3">task changed</th>
												<th scope="col" class="px-6 py-3">action</th>
										</tr>
								</thead>

								<tbody x-data="{ data: 5 }" class="divide-y bg-white text-left dark:divide-gray-700 dark:bg-gray-800">
										<template x-for="td in data">
												<tr
														class="text-gray-700 odd:bg-white even:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 odd:dark:bg-gray-800 even:dark:bg-gray-700">
														<td class="px-6 py-4" x-text="td"></td>
														<td class="px-6 py-4">Sliver</td>
														<td class="px-6 py-4">$2999</td>
														<td class="px-6 py-4">$2999</td>
														<td class="px-6 py-4">$2999</td>
														<td class="px-6 py-4">675456</td>
														<td class="space-x-3 px-6 py-4">
																<a href="#"><i
																				class="fas fa-edit focus:shadow-outline-gray text-purple-600 focus:outline-none dark:text-gray-400"></i></a>
																<a href="#"><i
																				class="fas fa-trash focus:shadow-outline-gray text-purple-600 focus:outline-none dark:text-gray-400"></i></a>
														</td>
												</tr>
										</template>
								</tbody>
						</table>
				</div>

		</section>

		<section>
				<div class="space-y-3 rounded-xl border border-gray-200 bg-gray-100 p-5 dark:border-gray-800 dark:bg-gray-800">
						<h2 class="text-base font-bold text-red-600 dark:text-red-400">delete your account</h2>
						<hr class="hr">
						<p class="text-sm font-bold leading-6 text-gray-600 dark:text-gray-300">Once you delete your account, there
								is no going back. Please be certain.</p>
						<a href="#" class="btn w-1/5 bg-red-600 hover:bg-red-700 active:bg-red-600">Delete your account</a>
				</div>
		</section>

@endsection
