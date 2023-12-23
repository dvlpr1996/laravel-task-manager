@extends('layouts.master')

@section('pageTitle', __('app.title.tomorrow tasks'))

@section('main-content')

		<section class="space-y-8">
				<h2>{{ __('app.header.your tomorrow tasks') }}</h2>
				<x-app.search />
		</section>

		<section class="space-y-2">
				<x-app.filter />
				<hr class="hr">
		</section>

		{{-- tommorrow tasks tables --}}
		<x-task.tomorrow-tasks />

@endsection
