<select class="form-control space-y-3 appearance-none" name="group_id">
		<option selected>select lists</option>
		@forelse ($allGroups as $group)

				 <option value="{{ $group->id }}" {{ $group->id == $select ? 'selected' : '' }}>
					{{ $group->name }}
				</option>
				
		@empty
				<option>No Lists Found</option>
		@endforelse
</select>
