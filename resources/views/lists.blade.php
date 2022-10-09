@extends('layouts.master')

@section('title', strtoupper('lists'))

@section('main-content')
		<h2>{{ $group->name }} list tasks</h2>

		@forelse ($tasks as $task)
				<x-single-task :task="$task"></x-all-tasktask>
				@empty
						<div class="box">
								<p class="py-2 px-5 text-center text-lg">
									not tasks found for this list
								</p>
						</div>
		@endforelse

@endsection
