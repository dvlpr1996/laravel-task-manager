<div class="bg-color text space-y-5 rounded-lg p-4 font-medium">
		<div>
				<h2 class="text-left font-semibold">{{ $task->name }}</h2>

				<p class="line-clamp-2 my-3 text-left">
						{{ $task->description ?? 'Not Defined Description For This Task' }}
				</p>
		</div>

		<hr>

		<div class="mt-5 flex items-center justify-between">
				<div class="flex gap-3">
						<a href="{{ route('tasks.destroy', $task->id) }}" onclick="return confirm('Are you sure?')">
								<i class="fas fa-trash"></i>
						</a>

						<x-modal-box>
								<x-slot:modalBtn>
										<i class="fas fa-edit" x-on:click="toggle()">
										</i>
								</x-slot:modalBtn>

								<x-slot:modalTitle>update your task</x-slot:modalTitle>

								<x-slot:modalContent>
										<form class="form-wrapper space-y-3 p-4" method="POST" action="{{ route('tasks.update', $task->id) }}">
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
														<input type="checkbox" class="form-control h-6 w-6 rounded-full" name="reminder" id="reminderUpdate"
																{{ $task->reminder == 1 ? 'checked' : '' }}>
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
				</div>

				<div class="hidden items-center justify-center gap-2 sm:flex md:justify-end">
						<span class="tag" title="due date">
								<i class="fas fa-stopwatch mr-2"></i>
								{{ $task->due_date }}
						</span>

						<span class="tag" title="priority level">
								<i class="{{ $task->priority->icon }} mr-2"></i>
								{{ $task->priority->level }}
						</span>

						<span class="tag" title="reminder">
								<i class="fas fa-bell mr-2"></i>
								{{-- <i class="fas fa-bell-slash"></i> --}}
								{{ $task->reminder }}
						</span>
				</div>

				<div class="block sm:hidden">
						<div x-data="dropdown" x-on:click.away="away()" class="relative">
								<button x-on:click="toggle()" class="link">
										<i class="fas fa-ellipsis-v"></i>
								</button>

								<div class="dropdown-content hidden" x-show="open" x-transition.duration.500ms
										x-bind:class="{ 'hidden': !open }">

										<div class="flex flex-col gap-3 p-3">
												<span title="due date">
														<i class="fas fa-stopwatch mr-2"></i>
														{{ $task->due_date }}
												</span>

												<span title="priority level">
														<i class="{{ $task->priority->icon }} mr-2"></i>
														{{ $task->priority->level }}
												</span>

												<span title="reminder">
														<i class="fas fa-bell mr-2"></i>
														{{-- <i class="fas fa-bell-slash"></i> --}}
														{{ $task->reminder }}
												</span>
										</div>
								</div>

						</div>
				</div>
		</div>

</div>
