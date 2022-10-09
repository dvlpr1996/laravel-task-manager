<section class="space-y-3">
		<div class="flex flex-row items-center justify-between">
				<h4>your all lists</h4>
				<div>
						<x-modal-box>
								<x-slot:modalBtn>
										<button type="button" class="btn order-1 w-full py-2 sm:order-2 sm:w-max" x-on:click="toggle()">
												add new list
										</button>
								</x-slot:modalBtn>

								<x-slot:modalTitle>add your new list</x-slot:modalTitle>

								<x-slot:modalContent>
										<form class="form-wrapper space-y-3 p-4" method="POST" action="{{ route('lists.store') }}">
												@csrf
												<div>
														<input type="text" placeholder="list name" name="name" class="form-control">
												</div>

												<div class="mt-5">
														<button type="submit" class="btn w-full py-2">
																add new list
														</button>
												</div>

										</form>
								</x-slot:modalContent>
						</x-modal-box>
				</div>
		</div>

		<div class="overflow-x-auto rounded-xl bg-white p-2 shadow-md dark:bg-gray-800">
				@if (count($allLists) > 0)
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
														<td class="px-4 py-3">
																<a href="{{ route('lists.index', $list->name) }}">
																		{{ $list->name }}
																</a>
														</td>
														<td class="px-4 py-3">{{ count($list->tasks) }} tasks</td>
														<td class="px-4 py-3">{{ $list->created_at }}</td>
														<td class="px-4 py-3">{{ $list->updated_at }}</td>
														<td class="flex items-center gap-3 px-4 py-3">
																@can('update', $list)
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
																@endcan
																@can('delete', $list)
																		<a href="{{ route('lists.destroy', $list->id) }}" onclick="return confirm('Are you sure?')">
																				<i class="fas fa-trash"></i>
																		</a>
																@endcan
														</td>
												</tr>
										@endforeach
								</tbody>
						</table>
						{{ $allLists->links('components.pagination') }}
				@else
				<div class="box text-center">
								<p>not list added yet</p>
						</div>
				@endif
		</div>

</section>
