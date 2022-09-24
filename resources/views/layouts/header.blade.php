<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
		<title>Task Manager - @yield('pageTitle', 'Task Manager')</title>
		<meta charset="UTF-8">
		<meta name="language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="index, follow">
		<meta name="designer" content="Nima jahan bakhshian/dvlpr1996">
		<meta name="owner" content="Nima jahan bakhshian/dvlpr1996">
		<meta name="author" content="Nima jahan bakhshian/dvlpr1996">
		<meta name="keywords" content="task manager, dvlpr1996,laravel,php,alpine.js,tailwind">
		<meta name="description" content="task manager (todo list) laravel app for managing tasks">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="theme-color" content="#1C1D1F">
		<meta name="msapplication-TileColor" content="#1C1D1F">
		<meta name="msapplication-navbutton-color" content="#1C1D1F">
		<meta name="apple-mobile-web-app-status-bar-style" content="#1C1D1F">
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/pngx-icon">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
		<link rel="apple-touch-icon" sizes="180x180"href="{{ asset('favicon.ico') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		@vite('resources/css/app.css')
		<!-- [if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<![endif] -->
</head>

<body x-data="{ 'darkMode': true }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)));">

		<div x-bind:class="{ 'dark': darkMode === true }">
