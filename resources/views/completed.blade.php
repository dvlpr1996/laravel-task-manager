@extends('layouts.master')
@section('title', strtoupper('completed tasks'))
@section('main-content')
		<section class="space-y-8">
				<h2>your completed tasks</h2>
				<x-app.search />
		</section>

		<section class="space-y-2">
				<x-filter></x-filter>
				<hr class="hr">
		</section>

		<x-completed-tasks></x-completed-tasks>

@endsection
