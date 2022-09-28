<select class="form-control" name="priority_id">
		<option>select prioraty</option>
		@forelse ($allPriority as $priority)
				<option value="{{ $priority->id }}" {{ $priority->id == $select ? 'selected' : '' }}>
					{{ $priority->prioritiesName }}
				</option>
		@empty
				<option>No Priority Level Found</option>
		@endforelse
</select>
