<div class="overflow-x-auto rounded-xl bg-white p-2 shadow-md dark:bg-gray-800">
		@if (count($completedTasks) > 0)
				<table>
						<thead>
								<tr>
										<th class="py-3 px-6 text-left">#</th>
										<th class="py-3 px-6 text-left">task</th>
										<th class="py-3 px-6 text-left">list</th>
										<th class="py-3 px-6 text-left">priority</th>
										<th class="py-3 px-6 text-left">status</th>
										<th class="py-3 px-6 text-left">Due date</th>
										<th class="py-3 px-6 text-left">created at</th>
										<th class="py-3 px-6 text-left">action</th>
								</tr>
						</thead>

						<tbody>
								@foreach ($completedTasks as $index => $task)
										<tr>
												<td class="py-3 px-6 text-left">{{ ++$index }}</td>
												<td class="py-3 px-6 text-left">{{ $task->name }}</td>
												<td class="py-3 px-6 text-left">{{ $task->group->name }}</td>
												<td class="flex items-center gap-2 py-3 px-6 text-left">
														<i class="{{ $task->priority->icon }}"></i>
														{{ $task->priority->level }}
												</td>
												<td class="py-3 px-6 text-left">{{ $task->status }}</td>
												<td class="py-3 px-6 text-left">{{ $task->due_date }}</td>
												<td class="py-3 px-6 text-left">{{ $task->created_at }}</td>
												<td class="flex items-center space-x-3 py-3 px-6">

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
						<p class="py-2 px-5 text-center text-xl">not task completed yet</p>
				</div>
		@endif
		{{ $completedTasks->links('components.pagination') }}
</div>
