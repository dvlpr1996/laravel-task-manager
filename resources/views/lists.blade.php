@extends('layouts.master')

@section('pageTitle', __('app.title.lists'))

@section('main-content')
		<h2>{{ $groupName }} list tasks</h2>

		@forelse ($tasks as $task)
				<x-task.single-task :task="$task" />
		@empty
				<div class="box">
						<p class="py-2 px-5 text-center text-lg capitalize">
              {{ __('app.empty msg.not tasks found') }}
						</p>
				</div>
		@endforelse

@endsection
