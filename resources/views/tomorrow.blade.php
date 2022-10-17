@extends('layouts.master')
@section('title', strtoupper('Tomorrow tasks'))
@section('main-content')
		<section class="space-y-8">
				<h2>your tomorrow tasks</h2>
				<x-search></x-search>
		</section>

		<section class="space-y-2">
				<x-filter></x-filter>
				<hr class="hr">
		</section>

		<x-tomorrow-tasks></x-tomorrow-tasks>

@endsection
