@extends('layouts.master')

@section('title', strtoupper('inbox'))

@section('main-content')
		<section class="space-y-8">
				<h2>your inbox</h2>

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

		<section class="space-y-5">
				<div class="flex flex-col items-center justify-center gap-5 sm:flex-row sm:items-end sm:justify-between">
						<div class="order-2 flex items-center justify-between gap-2 sm:order-1">
								<p>Sort :</p>
								<a href="#"><i class="fas fa-sort-alpha-down ml-1"></i> AS</a>
								<a href="#"><i class="fas fa-sort-alpha-down-alt ml-1"></i> DS</a>
								<a href="#"><i class="fas fa-stopwatch ml-1"></i> Due date</a>
						</div>

						<x-auth-validation-errors class="round mb-2 bg-red-400 p-2" :errors="$errors" />

						<x-modal-box>
								<x-slot:modalBtn>
										<button type="button" class="btn order-1 w-full py-2 sm:order-2 sm:w-max" x-on:click="toggle()">
												add new task
										</button>
								</x-slot:modalBtn>

								<x-slot:modalTitle>add your task</x-slot:modalTitle>

								<x-slot:modalContent>
										<form class="form-wrapper space-y-3 p-4" method="POST" action="{{ route('tasks.store') }}">
												@csrf
												<div>
														<input type="text" placeholder="task name" name="name" class="form-control">
												</div>

												<div class="mt-5">
														<x-groups></x-groups>
												</div>

												<div class="mt-5">
														<x-priorities></x-priorities>
												</div>

												<div class="space-y-3">
														<label>chose due time:</label>
														<input type="date" class="form-control" name="due_date">
												</div>

												<div class="flex items-center gap-2">
														<input type="checkbox" class="form-control h-6 w-6 rounded-full" name="reminder" value="1">
														<label>set reminder</label>
												</div>

												<div class="space-y-3">
														<label>task description:</label>
														<textarea name="description" col="10" class="form-control">
													</textarea>
												</div>

												<div class="mt-5">
														<button type="submit" class="btn w-full py-2">
																add new task
														</button>
												</div>

										</form>
								</x-slot:modalContent>
						</x-modal-box>

				</div>

				<hr class="hr">

				<div class="overflow-x-auto rounded-xl bg-white p-2 shadow-md dark:bg-gray-800">
						@if (count($allTasks) > 0)
								<table>
										<thead>
												<tr>
														<th class="py-3 px-6">#</th>
														<th class="py-3 px-6">task</th>
														<th class="py-3 px-6">list</th>
														<th class="py-3 px-6">priority</th>
														<th class="py-3 px-6">status</th>
														<th class="py-3 px-6">Due date</th>
														<th class="py-3 px-6">created at</th>
														<th class="py-3 px-6">action</th>
												</tr>
										</thead>

										<tbody>
												@foreach ($allTasks as $index => $task)
														<tr>
																<td class="py-3 px-6">{{ ++$index }}</td>
																<td class="py-3 px-6">{{ $task->name }}</td>
																<td class="py-3 px-6">
																		<a href="{{ route('lists.index', $task->group->name) }}">
																				{{ $task->group->name }}
																		</a>
																</td>
																<td class="flex items-center gap-2 py-3 px-6">
																		<a href="{{ route('priorities.index', $task->priority->id) }}">
																				<i class="{{ $task->priority->icon }} mr-2"></i>
																				{{ $task->priority->level }}
																		</a>
																</td>
																<td class="py-3 px-6">{{ $task->status }}</td>
																<td class="py-3 px-6">{{ $task->due_date }}</td>
																<td class="py-3 px-6">{{ $task->created_at }}</td>
																<td class="flex items-center space-x-3 py-3 px-6">

																		<x-modal-box>
																				<x-slot:modalBtn>
																						<i class="fas fa-edit" x-on:click="toggle()">
																						</i>
																				</x-slot:modalBtn>

																				<x-slot:modalTitle>update your task</x-slot:modalTitle>

																				<x-slot:modalContent>
																						<form class="form-wrapper space-y-3 p-4" method="POST"
																								action="{{ route('tasks.update', $task->id) }}">
																								@csrf
																								@method('PUT')
																								<div>
																										<input type="text" placeholder="task name" name="name" class="form-control"
																												value="{{ $task->name }}">
																								</div>

																								<div class="mt-5">
																										<x-groups :select="$task->group_id"></x-groups>
																								</div>

																								<div class="mt-5">
																										<x-priorities :select="$task->priority_id"></x-priorities>
																								</div>

																								<div class="space-y-3">
																										<label>chose due time:</label>
																										<input type="date" class="form-control" name="due_date"
																												value="{{ date('Y-m-d', strtotime($task->due_date)) }}">
																								</div>

																								<div class="flex items-center gap-2">
																										<input type="checkbox" class="form-control h-6 w-6 rounded-full" name="reminder"
																												id="reminderUpdate" {{ $task->reminder == 1 ? 'checked' : '' }}>
																										<label for="reminderUpdate">set reminder</label>
																								</div>

																								<div class="space-y-3">
																										<label>task description:</label>
																										<textarea name="description" col="10" class="form-control">
																													{{ $task->description }}
																													</textarea>
																								</div>

																								<div class="mt-5">
																										<button type="submit" class="btn w-full py-2">
																												save changes
																										</button>
																								</div>

																						</form>
																				</x-slot:modalContent>
																		</x-modal-box>

																		<a href="{{ route('tasks.destroy', $task->id) }}" onclick="return confirm('Are you sure?')">
																				<i class="fas fa-trash"></i>
																		</a>
																</td>
														</tr>
												@endforeach
										</tbody>
								</table>
						@else
								<div class="rounded-lg bg-slate-700 p-5 text-center">
										<p>not task added yet</p>
								</div>
						@endif
						{{ $allTasks->links('components.pagination') }}
				</div>


				{{-- <div>
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
				</div> --}}

		</section>
@endsection
