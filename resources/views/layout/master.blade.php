<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
		<title>@yield('pageTitle', 'Task Manager')</title>
		<meta charset="UTF-8">
		<meta name="language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="index, follow">
		<meta name="designer" content="Nima jahan bakhshian">
		<meta name="owner" content="Nima jahan bakhshian">
		<meta name="author" content="Nima jahan bakhshian">
		<meta name="keywords" content="task manager login, dvlpr1996">
		<meta name="description" content="task manager (todo list) laravel app for managing tasks">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{-- //todo : fix color --}}
		<meta name="theme-color" content="#1C1D1F">
		<meta name="msapplication-navbutton-color" content="#1C1D1F">
		<meta name="apple-mobile-web-app-status-bar-style" content="#1C1D1F">
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/pngx-icon">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.ico') }}">

		{{-- <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest"> --}}

		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<!-- [if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<![endif] -->
</head>

@yield('pageContent')

</body>

</html>
