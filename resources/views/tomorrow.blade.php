@extends('layouts.master')

@section('title', strtoupper('Tomorrow tasks'))

@section('main-content')

		<section class="space-y-8">
				<h2>your tomorrow tasks</h2>
				<x-app.search />
		</section>

		<section class="space-y-2">
				<x-app.filter />
				<hr class="hr">
		</section>

		{{-- tommorrow tasks tables --}}
		<x-tomorrow-tasks></x-tomorrow-tasks>

@endsection
