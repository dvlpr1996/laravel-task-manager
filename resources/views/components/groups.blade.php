<select class="form-control appearance-none space-y-3" name="group_id">
		<option selected>select lists</option>
		@forelse ($allGroups as $id => $name)
				<option value="{{ $id }}" {{ $id == $select ? 'selected' : '' }}>
						{{ $name }}
				</option>
		@empty
				<option>No Lists Found</option>
		@endforelse
</select>
