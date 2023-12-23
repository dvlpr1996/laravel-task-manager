@extends('layouts.master')

@section('pageTitle', __('app.title.completed tasks'))

@section('main-content')
		<section class="space-y-8">
				<h2>{{ __('app.header.your completed tasks') }}</h2>
				<x-app.search />
		</section>

		<section class="space-y-2">
				<x-app.filter />
				<hr class="hr">
		</section>

		<x-task.completed-tasks />

@endsection
