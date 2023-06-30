<x-modal-box>
	<x-slot:modalBtn>
			<button type="button" class="{{ $modalType }}" x-on:click="toggle()">
				<i class="fas fa-plus mr-1"></i>
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
							<label class="text">set reminder</label>
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
