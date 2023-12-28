<select class="form-control appearance-none" name="priority_id">
		<option selected>select prioraty</option>
		@forelse ($allPriority as $id=> $level)
				<option value="{{ $id }}" {{ $id == $select ? 'selected' : '' }}>
					{{ $level }}
				</option>
		@empty
				<option>No Priority Level Found</option>
		@endforelse
</select>
