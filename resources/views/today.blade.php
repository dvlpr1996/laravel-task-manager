@extends('layouts.master')

@section('title', strtoupper('today tasks'))

@section('main-content')
		<section class="space-y-8">
				<h2>your today tasks</h2>
				<x-app.search />
		</section>

		<section class="space-y-2">
				<x-app.filter />
				<hr class="hr">
		</section>

		{{-- today tasks tables --}}
		<x-today-tasks></x-today-tasks>

@endsection
