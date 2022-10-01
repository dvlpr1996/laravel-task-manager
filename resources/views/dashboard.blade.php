@extends('layouts.master')

@section('title', strtoupper('dashboard'))

@section('main-content')
		<h2>Task Manager - Dashboard</h2>
		<section class="grid gap-2 xs:grid-cols-2 sm:grid-cols-4">
				<div class="box">
						<p>
								<span class="block text-base font-semibold">
									{{ auth()->user()->calculateDaysWithUs() }}
								</span>
								with us
						</p>
				</div>

				<div class="box">
						<p>
								<span class="block text-base font-semibold">
									{{ auth()->user()->calculateTotalTask() }}
								</span>
								total task
						</p>
				</div>

				<div class="box">
						<p>
								<span class="block text-base font-semibold">
									{{ auth()->user()->calculateUnDoneTask() }}
								</span>
								undone task
						</p>
				</div>

				<div class="box">
						<p>
								<span class="block text-base font-semibold">
									{{ auth()->user()->calculateTotalList() }}
								</span>
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
						@if (count($unfinishedTasks) > 0)
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
												@foreach ($unfinishedTasks as $index => $task)
														<tr>
																<td class="py-3 px-6">{{ ++$index }}</td>
																<td class="py-3 px-6">{{ $task->name }}</td>
																<td class="py-3 px-6">
																		<a href="{{ route('lists.index', $task->group->name) }}">
																				{{ $task->group->name }}
																		</a>
																</td>
																<td class="flex items-center gap-2 py-3 px-6">
																		<i class="{{ $task->priority->icon }}"></i>
																		{{ $task->priority->level }}
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
								<div class="box">
										<p class="py-2 px-5 text-center text-xl">not task added yet</p>
								</div>
						@endif
						{{ $unfinishedTasks->links('components.pagination') }}
				</div>
		</section>

		<section>
				<div class="box space-y-3">
						<h2>delete your account</h2>
						<hr>
						<p>Once you delete your account, there
								is no going back. Please be certain.</p>
						<a href="{{ route('dashboard.destroyUser' , auth()->user()->id) }}" onclick="return confirm('are you sure?');"
								class="btn w-full bg-rose-600 py-2 text-base hover:bg-rose-700 sm:w-max">
								Delete your account
						</a>
				</div>
		</section>

@endsection
