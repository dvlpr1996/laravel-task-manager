@extends('layouts.master')

@section('pageTitle', __('app.title.inbox'))

@section('main-content')

		<section class="space-y-8">
				<h2>{{ __('app.header.your inbox - all your tasks') }}</h2>
				<x-app.search />
		</section>

		<section class="space-y-5">
				<div class="flex flex-col justify-center gap-5 sm:flex-row sm:items-end sm:justify-between">

						<x-app.filter class="order-2 justify-center sm:order-1" />
						<x-auth.auth-validation-errors class="round mb-2 bg-red-400 p-2" :errors="$errors" />

						@can('create', App\Models\Task::class)
								<x-task.add-task modalType="btn order-1 py-2 sm:order-2 sm:w-max w-full" />
						@endcan
				</div>

				<hr class="hr">

				<div class="overflow-x-auto rounded-xl bg-white p-2 shadow-md dark:bg-gray-800">
						@if (count($tasks) > 0)
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
												@foreach ($tasks as $index => $task)
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
																<td class="py-3 px-6 text-rose-700">{{ $task->status }}</td>
																<td class="py-3 px-6">{{ $task->due_date }}</td>
																<td class="py-3 px-6">{{ $task->created_at }}</td>
																<td class="flex items-center space-x-3 py-3 px-6">
																		<x-modal-box>
																				<x-slot:modalBtn>
																						<i class="fas fa-edit text-green-700" x-on:click="toggle()">
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
																				<i class="fas fa-trash text-rose-700"></i>
																		</a>
																</td>
														</tr>
												@endforeach
										</tbody>
								</table>
						@else
								<div class="box text-center">
										<p>not task added yet</p>
								</div>
						@endif
						{{ $tasks->links('components.app.pagination') }}
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
