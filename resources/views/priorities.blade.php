@extends('layouts.master')

@section('title', strtoupper('priorities'))

@section('main-content')
		<h2>Task Manager - priorities</h2>

		@forelse ($tasks as $task)
				<x-task.single-task :task="$task" />
		@empty
				<div class="box">
						<p class="py-2 px-5 text-center text-lg capitalize">
								not tasks found for this priority
						</p>
				</div>
		@endforelse

@endsection
