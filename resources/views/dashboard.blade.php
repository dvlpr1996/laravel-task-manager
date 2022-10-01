@extends('layouts.master')

@section('title', strtoupper('dashboard'))

@section('main-content')
		<h2>Task Manager - Dashboard</h2>
		<section class="grid gap-2 xs:grid-cols-2 sm:grid-cols-4">
				<div class="box">
						<p>
								<span class="block text-base font-semibold">555</span>
								days with us
						</p>
				</div>

				<div class="box">
						<p>
								<span class="block text-base font-semibold">17</span>
								total task
						</p>
				</div>

				<div class="box">
						<p>
								<span class="block text-base font-semibold">17</span>
								undone task
						</p>
				</div>

				<div class="box">
						<p>
								<span class="block text-base font-semibold">555</span>
								total list
						</p>
				</div>
		</section>

		<x-all-lists></x-all-lists>

		<section class="grid gap-2 xs:grid-cols-1 md:grid-cols-2">
				<div class="box">
						<p>
								<span class="block text-base font-semibold">555</span>
								days with us
						</p>
				</div>

				<div class="box">
						<p>
								<span class="block text-base font-semibold">555</span>
								days with us
						</p>
				</div>
		</section>

		<section class="space-y-3">
				<h4>Unfinished tasks</h4>
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
				<div class="box space-y-3">
						<h2>delete your account</h2>
						<hr>
						<p>Once you delete your account, there
								is no going back. Please be certain.</p>
						<a href="#" onclick="return confirm('are you sure?');"
						class="btn bg-rose-600 text-base hover:bg-rose-700 py-2 w-full sm:w-max">
							Delete your account
						</a>
				</div>
		</section>

@endsection
