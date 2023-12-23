@extends('layouts.master')

@section('pageTitle', __('app.title.today tasks'))

@section('main-content')
		<section class="space-y-8">
				<h2>{{ __('app.header.your today tasks') }}</h2>
				<x-app.search />
		</section>

		<section class="space-y-2">
				<x-app.filter />
				<hr class="hr">
		</section>

		{{-- today tasks tables --}}
		<x-task.today-tasks />

@endsection
