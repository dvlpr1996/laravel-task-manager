<select class="form-control appearance-none" name="priority_id">
		<option selected>select prioraty</option>
		@forelse ($allPriority as $priority)
				<option value="{{ $priority->id }}" {{ $priority->id == $select ? 'selected' : '' }}>
					{{ $priority->level }}
				</option>
		@empty
				<option>No Priority Level Found</option>
		@endforelse
</select>
