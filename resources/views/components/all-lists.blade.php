<section class="space-y-3">
		<h4>your lists</h4>
		<div class="overflow-x-auto rounded-xl bg-white p-2 shadow-md dark:bg-gray-800">
				@if (!is_null($allLists) || !empt($allLists))
						<table>
								<thead>
										<tr>
												<th class="px-4 py-2">#</th>
												<th class="px-4 py-2">name</th>
												<th class="px-4 py-2">count of tasks</th>
												<th class="px-4 py-2">created at</th>
												<th class="px-4 py-2">updated at</th>
												<th class="px-4 py-2">action</th>
										</tr>
								</thead>

								<tbody>
										@foreach ($allLists as $index => $list)
												<tr>
														<td class="px-4 py-3">{{ ++$index }}</td>
														<td class="px-4 py-3">{{ $list->name }}</td>
														<td class="px-4 py-3">{{ count($list->tasks) }} tasks</td>
														<td class="px-4 py-3">{{ $list->created_at }}</td>
														<td class="px-4 py-3">{{ $list->updated_at }}</td>
														<td class="gap-3 px-4 py-3 flex items-center">
																<x-modal-box>
																		<x-slot:modalBtn>
																				<i class="fas fa-edit" x-on:click="toggle()">
																				</i>
																		</x-slot:modalBtn>

																		<x-slot:modalTitle>update your lists name</x-slot:modalTitle>

																		<x-slot:modalContent>
																				<form class="form-wrapper space-y-3 p-4" method="POST"
																						action="{{ route('lists.update', $list->id) }}">
																						@csrf
																						@method('PUT')
																						<div>
																								<input type="text" placeholder="list name" name="name" class="form-control"
																										value="{{ $list->name }}">
																						</div>
																						<div class="mt-5">
																								<button type="submit" class="btn w-full py-2">
																										save changes
																								</button>
																						</div>

																				</form>
																		</x-slot:modalContent>
																</x-modal-box>

																<a href="{{ route('lists.destroy', $list->id) }}" onclick="return confirm('Are you sure?')">
																		<i class="fas fa-trash"></i>
																</a>
														</td>
												</tr>
										@endforeach
								</tbody>
						</table>
						{{ $allLists->links('components.pagination') }}
				@else
						<div class="box">
								<p class="py-2 px-5 text-center text-xl">not list added yet</p>
						</div>
				@endif
		</div>

</section>
