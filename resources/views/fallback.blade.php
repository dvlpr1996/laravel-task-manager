@include('layouts.header')

@section('pageTitle', __('app.title.404'))

<main class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-slate-900">
		<div class="text-center text-white">
				<h1 class="text-5xl">{{ __('app.error.404 msg') }}</h1>
				<a href="{{ route('dashboard.index') }}" class="mt-5 inline-block text-xl text-black">
						{{ __('app.error.404 page btn txt') }}
				</a>
		</div>
</main>

@include('layouts.footer')
